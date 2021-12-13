<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\StudentReport;
use App\Models\Student;
use App\Http\Resources\QuizResource;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index() {
        if (Quiz::all() === null) {
            return response([
                'response' => 'Quiz questions not found'
            ], 404);
        }
        else {
            return QuizResource::Collection(Quiz::paginate(1000));
        }
    }

    public function show($id) {
        if (Quiz::where('id', $id)->exists()) {
            return new QuizResource(Quiz::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Quiz questions not found'
            ], 404);
        }
    }

    public function create(Request $request) {

        $validator = \Validator::make($request->all(), [
            'question' => ['required', 'max:4294967295'],
            'options' => ['required'],
            'answer' => ['required', 'string', 'max:12'],
            'description' => ['nullable', 'string', 'max:4294967295'],
            'chapter' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'subChapter' => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }
        
        Quiz::create([
            'question' => $request->question,
            'options' => $request->options,
            'answer' => $request->answer,
            'description' => $request->description,
            'chapter' => $request->chapter,
            'category' => $request->category,
            'subChapter' => $request->subChapter
        ]);
    
        return response([
            'response' => [
                'question' => $request->question,
                'options' => $request->options,
                'answer' => $request->answer,
                'description' => $request->description,
                'chapter' => $request->chapter,
                'category' => $request->category,
                'subChapter' => $request->subChapter,
                'message' => 'New Quiz questions added'
            ]
        ], 201);
    }

    public function update(Request $request, $id) {
        if (Quiz::where('id', $id)->exists()) {
            $quiz = Quiz::find($id);
            $quiz->question = is_null($request->question) ? $quiz->question : $request->question;
            $quiz->options = is_null($request->options) ? $quiz->options : json_encode($request->options);
            $quiz->answer = is_null($request->answer) ? $quiz->answer : $request->answer;
            $quiz->description = is_null($request->description) ? $quiz->description : $request->description;
            $quiz->chapter = is_null($request->chapter) ? $quiz->chapter : $request->chapter;
            $quiz->category = is_null($request->category) ? $quiz->category : $request->category;
            $quiz->subChapter = is_null($request->subChapter) ? $quiz->subChapter : $request->subChapter;

            $quiz->save();

            return response([
                'response' => [
                    'id' => $quiz->id,
                    'question' => $quiz->question,
                    'options' => json_decode($quiz->options),
                    'answer' => $quiz->answer,
                    'description' => $quiz->description,
                    'chapter' => $quiz->chapter,
                    'category' => $quiz->category,
                    'subChapter' => $quiz->subChapter,
                ],
                'message' => 'Quiz question updated successfully'
            ], 201);
        }
        else {
            return response([
                'message' => 'Quiz questions not found'
            ], 404);
        }
    }

    public function destroy(Request $request, $id) {
        if(Quiz::where('id', $id)->exists()) {
            $quiz = Quiz::find($id);
            $quiz->delete();

            return response([
                'message' => 'Quiz questions deleted successfully'
            ], 201);
        } else {
            return response([
                'message' => 'Quiz questions not found'
            ], 404);
        }
    }

    public function showQuizCategory(Request $request) {

        $validator = \Validator::make($request->all(), [
            'category' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        return response([
            'response' => Quiz::where("category", "LIKE", "%{$request->category}%")->paginate(100)
        ], 201);
    }

    public function showQuizChapter(Request $request) {

        if ($request->forWhat == 'subchapter') {
            return response([
                'response' => Quiz::where("subChapter", "LIKE", "%{$request->subChapter}%")->get()
            ], 201);
        }
        else {
            $validator = \Validator::make($request->all(), [
                'chapter' => ['required', 'string', 'max:255'],
            ]);
    
            if ($validator->fails()) {
                return response([
                    'response' => $validator->errors()
                ], 404);
            }
            
            return response([
                'response' => Quiz::where("chapter", "LIKE", "%{$request->chapter}%")->get()
            ], 201);
        }
    }

    public function checkQuizAnswer(Request $request) {
        // return response ([
        //     'response' => 'something is messing'
        // ], 201);

        $validator = \Validator::make($request->all(), [
            'answerSheet' => ['required'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        $arrays = $request->answerSheet;
        $totalQuestion = $request->totalQuestion;
        $attemptedTotal = sizeof($arrays);
        $correct = 0;

        foreach ($arrays as $value) {
            $questionId = $value['question'];
            $answer = $value['answer'];
            $answerArray = array('0', 'A', 'B', 'C', 'D');

            $getQuestion = Quiz::find($questionId);

            $checkAnswer = Quiz::where('id', $questionId)->where('answer', $answerArray[$answer])->get();

            $correct = sizeof($checkAnswer);
        }

        // add it to studentReport
        if ($request->order == 'save') {
            $validator = \Validator::make($request->all(), [
                "token" => ["required", "string", "min:100"]
            ]);
    
            if ($validator->fails()) {
                return response([
                    'response' => $validator->errors()
                ], 404);
            }

            $student = DB::table('students')->where('token', $request->token)->first();
            if ($student) {
                StudentReport::create([
                    'user_id' => $student->id,
                    'question_answer' => json_encode($request->answerSheet),
                    'question_attempted_count' => $attemptedTotal,
                    'correct_answer_count' => $correct,
                    'total_question' => $totalQuestion,
                ]);
            }
        }

        return response([
            "response" => [
                "attemptedTotal" => $attemptedTotal,
                "correct" => $correct,
                "total" => $totalQuestion,
            ]
        ], 201);
    }
}
