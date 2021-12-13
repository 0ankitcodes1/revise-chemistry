<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Facades\DB;

class CheckIfItIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = \Validator::make($request->all(), [
            "token" => ["required", "string", "min:100"]
        ]);

        if ($validator->fails()) {
            return response([
                "response" => $validator->errors()
            ], 404);
        }

        if (Admin::where("token", $request->token)->exists()) {
            if ($request->checkOrder == 'check-admin') {
                return response([
                    "response" => "valid"
                ], 201);
            }
            else {
                $query = Admin::where("token", $request->token)->first();
                $request->merge(array('user_id' => $query->id));
                return $next($request);
            }
        }
        else {
            return response([
                "response" => "Admin not found"
            ], 404);
        }
    }
}
