<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Resources\NoteResource;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function index() {
        if (Note::all() === null) {
            return response([
                'response' => 'Notes not found'
            ], 404);
        }
        else {
            return NoteResource::Collection(Note::paginate(1000));
        }
    }

    public function show($id) {
        if (Note::where('id', $id)->exists()) {
            return new NoteResource(Note::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Notes not found'
            ], 404);
        }
    }

    public function create(Request $request) {

        $validator = \Validator::make($request->all(), [
            'chapter' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'notes' => ['required', 'string', 'max:4294967295'],
            'subChapter' => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }
        
        Note::create([
            'chapter' => $request->chapter,
            'category' => $request->category,
            'notes' => $request->notes,
            'subChapter' => $request->subChapter
        ]);
    
        return response([
            'response' => [
                'chapter' => $request->chapter,
                'category' => $request->category,
                'notes' => $request->notes,
                'subChapter' => $request->subChapter,
                'message' => 'New Notes added'
            ]
        ], 201);
    }

    public function update(Request $request, $id) {
        if (Note::where('id', $id)->exists()) {
            $note = Note::find($id);
            $note->chapter = is_null($request->chapter) ? $note->chapter : $request->chapter;
            $note->category = is_null($request->category) ? $note->category : $request->category;
            $note->notes = is_null($request->notes) ? $note->notes : $request->notes;
            $note->subChapter = is_null($request->subChapter) ? $note->subChapter : $request->subChapter;

            $note->save();

            return response([
                'response' => [
                    'id' => $note->id,
                    'chapter' => $note->chapter,
                    'category' => $note->category,
                    'notes' => $note->notes,
                    'subChapter' => $note->subChapter
                ],
                'message' => 'Note updated successfully'
            ], 201);
        }
        else {
            return response([
                'message' => 'Notes not found'
            ], 404);
        }
    }

    public function destroy(Request $request, $id) {
        if(Note::where('id', $id)->exists()) {
            $note = Note::find($id);
            $note->delete();

            return response([
                'message' => 'Notes deleted successfully'
            ], 201);
        } else {
            return response([
                'message' => 'Notes not found'
            ], 404);
        }
    }

    public function showNoteCategory(Request $request) {

        $validator = \Validator::make($request->all(), [
            'category' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        return response([
            'response' => Note::where("category", $request->category)->paginate(1000)
        ], 201);
    }

    public function showNoteChapter(Request $request) {

        $validator = \Validator::make($request->all(), [
            'chapter' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        return response([
            'response' => Note::where("chapter", "LIKE", "%{$request->chapter}%")->paginate(100)
        ], 201);
    }

    public function upload(Request $request) {
        $validator = \Validator::make($request->all(), [
            'image' => ['required', 'mimes:png,jpg,jpeg,gif'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        $picName = time(). '.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $picName);
        return $picName;
    }

    public function search(Request $request) {
        $validator = \Validator::make($request->all(), [
            'chapter' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        $searchQuery = Note::where("chapter", "LIKE", "%{$request->chapter}%")->get();

        return response([
            'response' => $searchQuery
        ], 201);
    }
}
