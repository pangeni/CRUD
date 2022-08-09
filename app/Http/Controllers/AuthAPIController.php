<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required |String',
            'email' => 'required |String',
            'password' => 'required |String | confirmed ',
        ]); 

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]); 

        $token = $user->createToken ('myapptoken')->plainTextToken; 

            $response = [
                'user' => $user, 
                'token' => $token
            ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete(); 
        return [
            'message' => 'logged out'
        ];
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required |String',
            'password' => 'required |String',
        ]); 


        //Check Password
        $user = Users::where('email', $fields['email'])->first();
        
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response ([
                'message' => 'Bad credential'
            ], 401);
        }

        $token = $user->createToken ('myapptoken')->plainTextToken; 

            $response = [
                'user' => $user, 
                'token' => $token
            ];
        return response($response, 201);
    }
}
