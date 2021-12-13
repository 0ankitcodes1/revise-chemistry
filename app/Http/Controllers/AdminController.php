<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Jobs\AdminForgotPasswordJob;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        if (Admin::all() === null) {
            return response([
                'response' => 'Admin not found'
            ], 404);
        }
        else {
            return AdminResource::Collection(Admin::paginate(10));
        }
    }

    public function show($id) {
        if (Admin::where('id', $id)->exists()) {
            return new AdminResource(Admin::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Admin not found'
            ], 404);
        }
    }

    public function create(Request $request) {
        $validator = \Validator::make($request->all(), [
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'email', 'unique:admins', 'max:255'],
            'avatar' => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }
        
        $token = Str::random(255);

        Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
            'token' => $token,
        ]);
    
        return response([
            'response' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'avatar' => $request->avatar,
                'token' => $token,
                'message' => 'New Admin added'
            ]
        ], 201);
    }

    public function update(Request $request) {
        if (Admin::where('id', $request->user_id)->exists()) {
            $admin = Admin::find($request->user_id);
            $admin->first_name = is_null($request->first_name) ? $admin->first_name : $request->first_name;
            $admin->last_name = is_null($request->last_name) ? $admin->last_name : $request->last_name;

            if($request->avatar == null) {
                $admin->avatar = $admin->avatar;
            }
            else {
                $validator = \Validator::make($request->all(), [
                    'avatar' => ['required', 'mimes:png,jpg,jpeg,gif'],
                ]);
        
                if ($validator->fails()) {
                    return response([
                        'response' => $validator->errors()
                    ], 404);
                }
                $image = $request->file("avatar");
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $realPath = $image->getRealPath();
                $size = $image->getSize();
                $type = $image->getMimeType();

                $allowed = array("image/jpg", "image/jpeg", "image/png", "image/gif");

                if (in_array($type, $allowed)) {
                    if ($size < 100*1024) {
                        $destinationPath = "C:/xampp/htdocs/quiz-app/public/resources/images/avatar/";
                        $newName = 'admin_profile-'.$admin->id.'-'.time().'.'.$extension;
                        $image->move($destinationPath, $newName);

                        $admin->avatar = env('APP_URL')."/resources/images/avatar/".$newName;
                    }
                    else {
                        $admin->avatar = $admin->avatar;
                        return response([
                            "response" => "Image size is too large",
                            "message" => "Image size should be less than 100 KB"
                        ], 404);
                    }
                }
                else {
                    $admin->avatar = $admin->avatar;
                    return response([
                        "response" => "Image formate not supported",
                        "message" => "Only 'jpeg', 'jpg', 'png' and 'gif' allowed"
                    ], 404);
                }
            }

            $admin->save();

            return response([
                'response' => [
                    'id' => $admin->id,
                    'first_name' => $admin->first_name,
                    'last_name' => $admin->last_name,
                    'email' => $admin->email,
                    'avatar' => $admin->avatar,
                    'token' => $admin->token,
                ],
                'message' => 'Admin record updated successfully'
            ], 201);
        }
        else {
            return response([
                'message' => 'Admin record not found'
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
        if (Admin::where('id', $request->user_id)->exists()) {
            $admin = Admin::find($request->user_id);
            $admin->password = Hash::make($request->new_password);

            $newToken = Str::random(255);
            $admin->token = $newToken;

            $admin->save();

            return response([
                'response' => [
                    'id' => $admin->id,
                    'first_name' => $admin->first_name,
                    'last_name' => $admin->last_name,
                    'email' => $admin->email,
                    'avatar' => $admin->avatar,
                    'token' => $admin->token,
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
        $admin = Admin::find($request->user_id);
        $admin->delete();
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

        if(Admin::where('email', $request->email)->exists()) {
            $query = Admin::where('email', $request->email)->first();

            if (Hash::check($request->password, $query->password)) {
                return response([
                    "response" => [
                        'first_name' => $query->first_name,
                        'last_name' => $query->last_name,
                        'email' => $query->email,
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
        if(Admin::where('token', $request->token)->exists()) {
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
            ], 404);
        }

        if (Admin::where("email", $request->email)->exists()) {
            $query = Admin::where("email", $request->email)->first();

            $details = [
                "student" => [
                    'first_name' => $query->first_name,
                    'last_name' => $query->last_name,
                    'email' => $query->email,
                    'password' => $query->password,
                    'avatar' => $query->avatar,
                    'token' => $query->token,
                ],
                "message" => "sending mail"
            ];
    
            /* Add Job Dispatcher Here */
            AdminForgotPasswordJob::dispatch($details);
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
