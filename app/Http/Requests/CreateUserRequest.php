<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|string',
            'state_id' => 'required|exists:states,id',

        ];
    }
}
