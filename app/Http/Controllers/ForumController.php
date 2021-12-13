<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Http\Resources\ForumResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    public function index() {
        if (Forum::all() === null) {
            return response([
                'response' => 'Forum data not found'
            ], 404);
        }
        else {
            return ForumResource::Collection(Forum::paginate(10));
        }
    }

    public function show($id) {
        if (Forum::where('id', $id)->exists()) {
            return new ForumResource(Forum::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Forum data not found'
            ], 201);
        }
    }

    public function create(Request $request) {
        $validator = \Validator::make($request->all(), [
            'user_id' => ['required', 'integer', 'max:255'],
            'reply' => ['required', 'string', 'max:4294967295'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        
        Forum::create([
            'user_id' => $request->user_id,
            'reply' => $request->reply,
        ]);
    
        return response([
            'response' => [
                'user_id' => $request->user_id,
                'reply' => $request->reply,
                'message' => 'New Forum data added'
            ]
        ], 201);
    }

    public function update(Request $request, $id) {
        if (Forum::where('id', $id)->exists()) {
            if(Forum::where('user_id', $request->user_id)->exists()) {
                $forum = Forum::find($id);
                $forum->reply = is_null($request->reply) ? $blog->reply : $request->reply;

                $forum->save();

                return response([
                    'response' => [
                        'id' => $forum->id,
                        'user_id' => $forum->user_id,
                        'question' => $forum->question,
                        'reply' => $forum->reply,
                        'reply_to' => $forum->reply_to,
                    ],
                    'message' => 'Forum data updated successfully'
                ], 201);
            }
            else {
                return response([
                    'message' => 'Forum data belong to different user'
                ], 404);
            }
        }
        else {
            return response([
                'message' => 'Forum data not found'
            ], 404);
        }
    }

    public function destroy(Request $request, $id) {
        if(Forum::where('id', $id)->exists()) {
            if(Forum::where('user_id', $request->user_id)->exists()) {
                $forum = Forum::find($id);
                $forum->delete();

                return response([
                    'message' => 'Forum data deleted successfully'
                ], 201);
            }
            else {
                return response([
                    'message' => 'Forum data belong to different user'
                ], 404);
            }
        } else {
            return response([
                'message' => 'Forum data not found'
            ], 404);
        }
    }

    // public function search(Request $request) {
    //     $validator = \Validator::make($request->all(), [
    //         'question' => ['required', 'string'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response([
    //             'response' => $validator->errors()
    //         ], 404);
    //     }
        
    //     $searchQuery = Forum::where("question", "LIKE", "%{$request->question}%")->get();

    //     return response([
    //         'response' => $searchQuery
    //     ], 201);
    // }
}
