<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with([
            'students.department',
            'teachers.department',
        ])->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->validated());

        return to_route('courses.index');
    }

    public function show($id)
    {
        $course = Course::with([
            'students.department',
            'teachers.department',
        ])->findOrFail($id);

        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update($request->validated());

        return to_route(
            'courses.show',
            $course->Course_ID
        );
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return to_route('courses.index');
    }
}