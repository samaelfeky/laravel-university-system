<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'department',
            'courses.teachers',
            'phones',
        ])->get();

        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'max:20'],
            'Department_ID' => ['nullable', 'exists:departments,Department_ID'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        $student = Student::create($validated);

        return response()->json(
            $student->load([
                'department',
                'courses.teachers',
                'phones',
            ]),
            201
        );
    }

    public function show(Student $student)
    {
        return response()->json(
            $student->load([
                'department',
                'courses.teachers',
                'phones',
            ])
        );
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'street' => ['sometimes', 'nullable', 'string', 'max:255'],
            'city' => ['sometimes', 'nullable', 'string', 'max:255'],
            'zip' => ['sometimes', 'nullable', 'string', 'max:20'],
            'Department_ID' => ['sometimes', 'nullable', 'exists:departments,Department_ID'],
            'user_id' => ['sometimes', 'nullable', 'exists:users,id'],
        ]);

        $student->update($validated);

        return response()->json(
            $student->load([
                'department',
                'courses.teachers',
                'phones',
            ])
        );
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully',
        ]);
    }
}
