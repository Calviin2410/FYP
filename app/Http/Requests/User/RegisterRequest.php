<?php

namespace App\Http\Requests\User;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ];
    }
}