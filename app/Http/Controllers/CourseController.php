<?php

namespace App\Http\Controllers;

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

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Course_Name' => ['required', 'string', 'max:255'],
            'Course_Fee' => ['required', 'numeric', 'min:0'],
        ]);

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        $course->load([
            'students',
            'teachers',
        ]);

        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'Course_Name' => ['required', 'string', 'max:255'],
            'Course_Fee' => ['required', 'numeric', 'min:0'],
        ]);

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
