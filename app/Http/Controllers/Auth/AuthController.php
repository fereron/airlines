<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Tymon\JWTAuth\JWTAuth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return response()->json('User created', 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $token = JWTAuth::attempt($credentials, [
                'exp' => Carbon::now()->addDay()->timestamp
            ]);
        }
        catch (JWTException $e) {
            return response()->json(['error' => $e], 500);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Could not authenticate'
            ], 401);
        }
        else {
            $data = [];
            $meta = [];

            $data['name'] = $request->user()->name;
            $meta['token'] = $token;

            return response()->json([
                'data' => $data,
                'meta' => $meta
            ]);
        }

    }


}
