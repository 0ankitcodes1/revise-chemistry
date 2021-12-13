<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index() {
        if (Blog::all() === null) {
            return response([
                'response' => 'Blog post not found'
            ], 404);
        }
        else {
            return BlogResource::Collection(Blog::paginate(1000));
        }
    }

    public function show($id) {
        if (Blog::where('id', $id)->exists()) {
            return new BlogResource(Blog::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Blog post not found'
            ], 404);
        }
    }

    public function create(Request $request) {

        $validator = \Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', 'unique:blogs'],
            'description' => ['required', 'string', 'max:4294967295'],
            'category' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'mimes:png,jpg,jpeg,gif'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        if($request->thumbnail == null) {
            return response([
                'response' => 'Thumbnail field is required'
            ], 404);
        }
        else {
            $image = $request->file("thumbnail");
            $name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $size = $image->getSize();
            $type = $image->getMimeType();

            $allowed = array("image/jpg", "image/jpeg", "image/png", "image/gif");

            if (in_array($type, $allowed)) {
                if ($size < 100*1024) {
                    $destinationPath = "/home/revitanv/public_html/resources/images/blog/";
                    // $destinationPath = "C:/xampp/htdocs/quiz-app/public/resources/images/blog/";
                    $newName = 'blog_thumbnail-'.time().'.'.$extension;
                    $image->move($destinationPath, $newName);

                    $request->thumbnail = env('APP_URL')."/resources/images/blog/".$newName;


                    Blog::create([
                        'title' => $request->title,
                        'description' => $request->description,
                        'category' => $request->category,
                        'thumbnail' => $request->thumbnail,
                    ]);
                
                    return response([
                        'response' => [
                            'title' => $request->title,
                            'description' => $request->description,
                            'category' => $request->category,
                            'thumbnail' => $request->thumbnail,
                            'message' => 'New blog post added'
                        ]
                    ], 201);

                }
                else {
                    return response([
                        "response" => "Image size is too large",
                        "message" => "Image size should be less than 100 KB"
                    ], 404);
                }
            }
            else {
                return response([
                    "response" => "Image formate not supported",
                    "message" => "Only 'jpeg', 'jpg', 'png' and 'gif' allowed"
                ], 404);
            }
        }
    }

    public function update(Request $request, $id) {
        if (Blog::where('id', $id)->exists()) {
            $blog = Blog::find($id);
            $blog->title = is_null($request->title) ? $blog->title : $request->title;
            $blog->description = is_null($request->description) ? $blog->description : $request->description;
            $blog->category = is_null($request->category) ? $blog->category : $request->category;

            if($request->thumbnail == null) {
                $blog->thumbnail = $blog->thumbnail;
            }
            else {
                $validator = \Validator::make($request->all(), [
                    'thumbnail' => ['required', 'mimes:png,jpg,jpeg,gif'],
                ]);
        
                if ($validator->fails()) {
                    return response([
                        'response' => $validator->errors()
                    ], 404);
                }

                $image = $request->file("thumbnail");
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $realPath = $image->getRealPath();
                $size = $image->getSize();
                $type = $image->getMimeType();

                $allowed = array("image/jpg", "image/jpeg", "image/png", "image/gif");

                if (in_array($type, $allowed)) {
                    if ($size < 100*1024) {
                        $destinationPath = "/home/revitanv/public_html/resources/images/blog/";
                        // $destinationPath = "C:/xampp/htdocs/quiz-app/public/resources/images/blog/";
                        $newName = 'blog_thumbnail-'.$blog->id.'-'.time().'.'.$extension;
                        $image->move($destinationPath, $newName);
    
                        $blog->thumbnail = env('APP_URL')."/resources/images/blog/".$newName;
                    }
                    else {
                        $blog->thumbnail = $blog->thumbnail;
                        return response([
                            "response" => "Image size is too large",
                            "message" => "Image size should be less than 100 KB"
                        ], 404);
                    }
                }
                else {
                    $blog->thumbnail = $blog->thumbnail;
                    return response([
                        "response" => "Image formate not supported",
                        "message" => "Only 'jpeg', 'jpg', 'png' and 'gif' allowed"
                    ], 404);
                }
            }

            $blog->save();

            return response([
                'response' => [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'description' => $blog->description,
                    'category' => $blog->category,
                    'thumbnail' => $blog->thumbnail,
                ],
                'message' => 'Blog post updated successfully'
            ], 201);
        }
        else {
            return response([
                'message' => 'Blog post not found'
            ], 404);
        }
    }

    public function destroy($id) {
        if(Blog::where('id', $id)->exists()) {
            $blog = Blog::find($id);
            $blog->delete();

            return response([
                'message' => 'Blog post deleted successfully'
            ], 201);
        } else {
            return response([
                'message' => 'Blog post not found'
            ], 404);
        }
    }

    public function filter(Request $request) {
        $validator = \Validator::make($request->all(), [
            'category' => ['required', 'string'],
            'order' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        
        if ($request->order == 'DESC') {
            if ($request->category == 'all') {
                $searchQuery = DB::table('blogs')->orderby('id', 'DESC')->paginate(15);

                return response([
                    'response' => $searchQuery
                ], 201);
            }
            else {
                if (Blog::where('category', $request->category)->exists()) {
                    $searchQuery = DB::table('blogs')->where('category', $request->category)->orderby('id', 'DESC')->paginate(15);

                    return response([
                        'response' => $searchQuery
                    ], 201);
                }
                else {
                    return response([
                        'response' => 'Blog post not found'
                    ], 404);
                }
            }
        }
        else if ($request->order == 'ASC') {
            if ($request->category == 'all') {
                $searchQuery = DB::table('blogs')->orderby('id', 'ASC')->paginate(15);
        
                return response([
                    'response' => $searchQuery
                ], 201);
            }
            else {
                if (Blog::where('category', $request->category)->exists()) {
                    $searchQuery = DB::table('blogs')->where('category', $request->category)->orderby('id', 'ASC')->paginate(15);
        
                    return response([
                        'response' => $searchQuery
                    ], 201);
                }
                else {
                    return response([
                        'response' => 'Blog post not found'
                    ], 404);
                }
            }
        }
    }

    public function search(Request $request) {
        $validator = \Validator::make($request->all(), [
            'title' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }

        $searchQuery = Blog::where("title", "LIKE", "%{$request->title}%")->get();

        return response([
            'response' => $searchQuery
        ], 201);
    }
}
