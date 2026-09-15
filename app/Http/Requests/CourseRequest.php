<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Course_Name' => 'required|string|min:2|max:100',
            'Course_Fee' => 'required|numeric|min:0',
        ];
    }
}