<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachesController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Teacher_ID' => ['required', 'exists:teachers,Teacher_ID'],
            'Course_ID' => ['required', 'exists:courses,Course_ID'],
        ]);

        $teacher = Teacher::findOrFail($validated['Teacher_ID']);

        $teacher->courses()->syncWithoutDetaching([
            $validated['Course_ID'],
        ]);

        return response()->json([
            'message' => 'Teacher assigned to course successfully',
            'teacher' => $teacher->load('courses'),
        ], 201);
    }

    public function destroy(Teacher $teacher, Course $course)
    {
        $teacher->courses()->detach($course->Course_ID);

        return response()->json([
            'message' => 'Teacher removed from course successfully',
        ]);
    }
}