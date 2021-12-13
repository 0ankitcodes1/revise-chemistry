<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Jobs\ForgotPasswordJob;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index() {
        if (Student::all() === null) {
            return response([
                'response' => 'Student not found'
            ], 404);
        }
        else {
            return StudentResource::Collection(Student::paginate(10));
        }
    }

    public function show($id) {
        if (Student::where('id', $id)->exists()) {
            return new StudentResource(Student::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Blog post not found'
            ], 404);
        }
    }

    public function create(Request $request) {
        $validator = \Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:students', 'max:255'],
            'contact' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
            'avatar' => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }
        
        $token = Str::random(255);

        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
            'token' => $token,
        ]);
    
        return response([
            'response' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'contact' => $request->contact,
                'password' => $request->password,
                'avatar' => $request->avatar,
                'token' => $token,
                'message' => 'New student added'
            ]
        ], 201);
    }

    public function update(Request $request) {
        if (Student::where('id', $request->user_id)->exists()) {
            $student = Student::find($request->user_id);
            $student->first_name = is_null($request->first_name) ? $student->first_name : $request->first_name;
            $student->last_name = is_null($request->last_name) ? $student->last_name : $request->last_name;
            $student->contact = is_null($request->contact) ? $student->contact : $request->contact;

            if($request->avatar == null) {
                $student->avatar = $student->avatar;
            }
            else {
                $image = $request->file("avatar");
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $realPath = $image->getRealPath();
                $size = $image->getSize();
                $type = $image->getMimeType();

                $allowed = array("image/jpg", "image/jpeg", "image/png", "image/gif");

                if (in_array($type, $allowed)) {
                    if ($size < 100*1024) {
                        $destinationPath = "/home7/ohhmartc/public_html/resources/images/uploads/";
                        $newName = 'profile-'.$query->id.'-'.time().'.'.$extension;
                        $image->move($destinationPath, $newName);

                        $student->avatar = env('APP_URL')."/resources/images/uploads/".$newName;
                    }
                    else {
                        $student->avatar = $student->avatar;
                        return response([
                            "response" => "Image size is too large",
                            "message" => "Image size should be less than 100 KB"
                        ], 404);
                    }
                }
                else {
                    $student->avatar = $student->avatar;
                    return response([
                        "response" => "Image formate not supported",
                        "message" => "Only 'jpeg', 'jpg', 'png' and 'gif' allowed"
                    ], 404);
                }
            }

            $student->save();

            return response([
                'response' => [
                    'id' => $student->id,
                    'first_name' => $student->first_name,
                    'last_name' => $student->last_name,
                    'contact' => $student->contact,
                    'email' => $student->email,
                    'avatar' => $student->avatar,
                ],
                'message' => 'Student record updated successfully'
            ], 201);
        }
        else {
            return response([
                'message' => 'Student record not found'
            ], 404);
        }
    }

    public function updatePassword(Request $request) {
        $validator = \Validator::make($request->all(), [
            'new_password' => ['required', 'string', 'max:255', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }
        if (Student::where('id', $request->user_id)->exists()) {
            $student = Student::find($request->user_id);
            $student->password = Hash::make($request->new_password);

            $newToken = Str::random(255);
            $student->token = $newToken;

            $student->save();

            return response([
                'response' => [
                    'id' => $student->id,
                    'first_name' => $student->first_name,
                    'last_name' => $student->last_name,
                    'contact' => $student->contact,
                    'email' => $student->email,
                    'avatar' => $student->avatar,
                    'token' => $student->token,
                ],
                'message' => 'Student record updated successfully'
            ], 201);
        }
        else {
            return response([
                'message' => 'Student record not found'
            ], 404);
        }
    }

    public function destroy(Request $request) {
        $student = Student::find($request->user_id);
        $student->delete();
        return response([
            "response" => "Account deleted successfully"
        ], 201);
    }

    public function login(Request $request) {
        $validator = \Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                "response" => $validator->errors()
            ], 404);
        }

        if(Student::where('email', $request->email)->exists()) {
            $query = Student::where('email', $request->email)->first();

            if (Hash::check($request->password, $query->password)) {
                return response([
                    "response" => [
                        'first_name' => $query->first_name,
                        'last_name' => $query->last_name,
                        'email' => $query->email,
                        'contact' => $query->contact,
                        'password' => $query->password,
                        'avatar' => $query->avatar,
                        'token' => $query->token,
                    ]
                ], 201);
            }
            else {
                return response([
                    "message" => "Incorrect password"
                ], 404);
            }
        }
        else {
            return response([
                "message" => "Invalid email"
            ], 404);
        }
    }

    public function logout(Request $request) {
        if(Student::where('token', $request->token)->exists()) {
            return response([
                "response" => "Loging out", 
                "note" => "Clear client token"
            ], 201);
        }
        else {
            return response([
                "response" => "Invalid customer"
            ], 201);
        }
    }

    public function forgotPassword(Request $request) {
        $validator = \Validator::make($request->all(), [
            "email" => ["required", "email", "max:100"]
        ]);

        if ($validator->fails()) {
            return response([
                "response" => $validator->errors()
            ], 201);
        }

        if (Student::where("email", $request->email)->exists()) {
            $query = Student::where("email", $request->email)->first();

            $details = [
                "student" => [
                    'first_name' => $query->first_name,
                    'last_name' => $query->last_name,
                    'email' => $query->email,
                    'contact' => $query->contact,
                    'password' => $query->password,
                    'avatar' => $query->avatar,
                    'token' => $query->token,
                ],
                "message" => "sending mail"
            ];
    
            /* Add Job Dispatcher Here */
            ForgotPasswordJob::dispatch($details);
            /* *********************** */

            return response([
                "response" => "Sending reset link"
            ], 201);
        }
        else {
            return response([
                "response" => "Invalid email"
            ], 404);
        }

    }
}
