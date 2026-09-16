<?php

namespace App\Http\Controllers;

use App\Models\Department;
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

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('teachers.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Teacher_ID' => [
                'required',
                'string',
                'max:255',
                'unique:teachers,Teacher_ID',
            ],
            'name' => ['required', 'string', 'max:255'],
            'Department_ID' => [
                'nullable',
                'exists:departments,Department_ID',
            ],
            'user_id' => [
                'nullable',
                'exists:users,id',
            ],
        ]);

        Teacher::create($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher created successfully.');
    }

    public function show(Teacher $teacher)
    {
        $teacher->load([
            'department',
            'courses',
        ]);

        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $departments = Department::all();

        return view('teachers.edit', compact(
            'teacher',
            'departments'
        ));
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
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],
            'Department_ID' => [
                'sometimes',
                'nullable',
                'exists:departments,Department_ID',
            ],
            'user_id' => [
                'sometimes',
                'nullable',
                'exists:users,id',
            ],
        ]);

        $teacher->update($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}
