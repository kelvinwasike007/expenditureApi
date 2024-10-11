<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if(Hash::check($request->password,$user->password)){
            return response()->json(['token'=> $user->createToken($user)->plainTextToken], 200);
        }
        return response()->json(['msg'=> 'invalid account'], 401);
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['msg'=>'Logged out successfully'], 200);
    }


    public function register(Request $request){
        $user = new User();
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();
        return response()->json($user);
    }
}