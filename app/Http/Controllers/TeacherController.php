<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with([
            'department',
            'courses',
        ])->get();

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $departments = Department::all();

        return view(
            'teachers.create',
            compact('departments')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Teacher_ID' => 'required|unique:teachers,Teacher_ID',
            'name' => 'required|string|max:255',
            'Department_ID' => 'nullable|exists:departments,Department_ID',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Teacher::create($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher added successfully.');
    }

    public function show($teacher)
    {
        $teacher = Teacher::with([
            'department',
            'user',
            'courses.students',
        ])->findOrFail($teacher);

        $availableCourses = Course::whereNotIn(
            'Course_ID',
            $teacher->courses->pluck('Course_ID')
        )->get();

        return view(
            'teachers.show',
            compact(
                'teacher',
                'availableCourses'
            )
        );
    }

    public function edit($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);

        $departments = Department::all();

        return view(
            'teachers.edit',
            compact(
                'teacher',
                'departments'
            )
        );
    }

    public function update(Request $request, $teacher)
    {
        $teacher = Teacher::findOrFail($teacher);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'Department_ID' => 'nullable|exists:departments,Department_ID',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $teacher->update($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);

        $teacher->delete();

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}