<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'type' => 'nullable|string|max:100',
            'Department_ID' => 'nullable|exists:departments,Department_ID',
            'user_id' => 'nullable|exists:users,id',
        ];
    }
}