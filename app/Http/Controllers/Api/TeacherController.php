<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with([
            'department',
            'courses',
        ])->get();

        return response()->json($teachers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Teacher_ID' => ['required', 'string', 'max:255', 'unique:teachers,Teacher_ID'],
            'name' => ['required', 'string', 'max:255'],
            'Department_ID' => ['nullable', 'exists:departments,Department_ID'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        $teacher = Teacher::create($validated);

        return response()->json(
            $teacher->load([
                'department',
                'courses',
            ]),
            201
        );
    }

    public function show(Teacher $teacher)
    {
        return response()->json(
            $teacher->load([
                'department',
                'courses',
            ])
        );
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'Teacher_ID' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                'unique:teachers,Teacher_ID,' . $teacher->Teacher_ID . ',Teacher_ID',
            ],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'Department_ID' => ['sometimes', 'nullable', 'exists:departments,Department_ID'],
            'user_id' => ['sometimes', 'nullable', 'exists:users,id'],
        ]);

        $teacher->update($validated);

        return response()->json(
            $teacher->load([
                'department',
                'courses',
            ])
        );
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json([
            'message' => 'Teacher deleted successfully',
        ]);
    }
}
