<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function signup(CreateUserRequest $request): JsonResponse 
    {
        $data = $request->only(['name', 'email', 'password', 'state_id']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $response = [
            'error' => '',
            'user' => $user->createToken('Register_token')->plainTextToken
        ];

        return response()->json($response);
    }

    public function signin(SignInRequest $request): JsonResponse 
    {
        $data = $request->only(['email', 'password']);

        if (Auth::attempt($data)) {
            $user = Auth::user();
            $response = [
                'error' => '',
                'token' => $user->createToken('Login_token')->plainTextToken
            ];
            return response()->json($response);
        }
        return response()->json(['error' => 'Usuário ou senha inválidos']);
    } 

    public function me(Request $r): JsonResponse 
    {
        $user = Auth::user();




        return response()->json($user);
    }
}
