<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function signup(CreateUserRequest $request): JsonResponse 
    {
        return response()->json(['method' => 'signup']);
    }

    public function signin(Request $r): JsonResponse 
    {
        return response()->json(['method' => 'signin']);
    } 

    public function me(Request $r): JsonResponse 
    {
        return response()->json(['method' => 'me']);
    }
}
