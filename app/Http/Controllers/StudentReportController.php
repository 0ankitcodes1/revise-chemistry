<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentReport;
use App\Http\Resources\StudentReportResource;
use Illuminate\Support\Facades\DB;

class StudentReportController extends Controller
{
    public function index() {
        if (StudentReport::all() === null) {
            return response([
                'response' => 'Student report not found'
            ], 404);
        }
        else {
            return StudentReportResource::Collection(StudentReport::paginate(50));
        }
    }

    public function show($id) {
        if (StudentReport::where('id', $id)->exists()) {
            return new StudentReportResource(StudentReport::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Student report not found'
            ], 404);
        }
    }

    public function create(Request $request) {

        $validator = \Validator::make($request->all(), [
            'question_answer' => ['nullable'],
            'question_attempted_count' => ['required', 'integer', 'max:255'],
            'correct_answer_count' => ['required', 'integer', 'max:255'],
            'total_question' => ['nullable', 'integer', 'max:255']
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }
        
        StudentReport::create([
            'user_id' => $request->user_id,
            'question_answer' => json_encode($request->question_answer),
            'question_attempted_count' => $request->question_attempted_count,
            'correct_answer_count' => $request->correct_answer_count,
            'total_question' => $request->total_question,
        ]);
    
        return response([
            'response' => [
                'user_id' => $request->user_id,
                'question_answer' => $request->question_answer,
                'question_attempted_count' => $request->question_attempted_count,
                'correct_answer_count' => $request->correct_answer_count,
                'total_question' => $request->total_question,
                'message' => 'New Student report added'
            ]
        ], 201);
    }

    public function destroy(Request $request, $id) {
        if(StudentReport::where('id', $id)->exists()) {
            $student_report = StudentReport::find($id);
            $student_report->delete();

            return response([
                'message' => 'Student report deleted successfully'
            ], 201);
        } else {
            return response([
                'message' => 'Student report not found'
            ], 404);
        }
    }

    public function showStudent(Request $request) {
        if (StudentReport::where('user_id', $request->user_id)->exists()) {
            return response([
                'response' => StudentReport::where("user_id", $request->user_id)->orderBy('created_at', 'desc')->paginate(1000)
            ], 201);
        }
        else {
            return response([
                'message' => 'No report found for this student'
            ], 404);
        }
    }
}
