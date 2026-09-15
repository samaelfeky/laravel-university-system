<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . $this->route('user'),
            'password' => $this->isMethod('POST')
                ? 'required|string|min:8'
                : 'nullable|string|min:8',
            'role' => 'required|in:user,admin',
        ];
    }
}