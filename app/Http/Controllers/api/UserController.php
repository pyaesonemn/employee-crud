<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;

class UserController extends Controller
{
    function signup(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                "name" => "required|string",
                "email" => "required|unique:users|string",
                "password" => "min:6|required|same:password_confirmation|string",
                "password_confirmation" => "min:6|string"
            ],
        );
        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()->all(), 400]);
        }
        $user = User::create($input);
        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "email" => "required|string",
            "password" => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()->all()], 400);
        }
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = Auth::user();
            $token = $user->createToken('Admin')->accessToken;
            return response()->json(["token" => $token, "user" => $user], 200);
        } else {
            return response()->json(["error" => "Invalid Credentials!"], 403);
        }
    }

    function updateInfo(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                "name" => "string",
                "email" => "required|string",
                "password" => "min:6|required|same:password_confirmation|string",
                "password_confirmation" => "min:6|string"
            ],
        );
        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()->all(), 400]);
        }

        $user = User::where('email', $input['email'])->first();
        if ($user !== null) {
            $condition = $user->update(['password' => $input['password'], 'name' => array_key_exists("name", $input) ? $input["name"] : $user->name]);
            return response()->json(['isUpdated' => $condition], 201);
        } else {
            return response()->json(['error' => "No user existed with that email"], 404);
        }

    }
}