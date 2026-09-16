<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with([
            'students',
            'teachers',
        ])->get();

        return response()->json($courses);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Course_Name' => ['required', 'string', 'max:255'],
            'Course_Fee' => ['required', 'numeric', 'min:0'],
        ]);

        $course = Course::create($validated);

        return response()->json(
            $course->load([
                'students',
                'teachers',
            ]),
            201
        );
    }

    public function show(Course $course)
    {
        return response()->json(
            $course->load([
                'students',
                'teachers',
            ])
        );
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'Course_Name' => ['sometimes', 'required', 'string', 'max:255'],
            'Course_Fee' => ['sometimes', 'required', 'numeric', 'min:0'],
        ]);

        $course->update($validated);

        return response()->json(
            $course->load([
                'students',
                'teachers',
            ])
        );
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([
            'message' => 'Course deleted successfully',
        ]);
    }
}
