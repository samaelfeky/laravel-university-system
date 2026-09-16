<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'department',
            'courses',
        ])->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('students.create', compact('departments'));
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

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        $student->load([
            'department',
            'courses.teachers',
        ]);

        $courses = Course::all();

        return view('students.show', compact('student', 'courses'));
    }

    public function edit(Student $student)
    {
        $departments = Department::all();

        return view('students.edit', compact(
            'student',
            'departments'
        ));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'max:20'],
            'Department_ID' => ['nullable', 'exists:departments,Department_ID'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }

    public function addCourse(Request $request, Student $student)
    {
        $validated = $request->validate([
            'Course_ID' => ['required', 'exists:courses,Course_ID'],
            'Semester' => ['required', 'string', 'max:255'],
        ]);

        $student->courses()->syncWithoutDetaching([
            $validated['Course_ID'] => [
                'Semester' => $validated['Semester'],
            ],
        ]);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Course added successfully.');
    }

    public function removeCourse(Student $student, Course $course)
    {
        $student->courses()->detach($course->Course_ID);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Course removed successfully.');
    }
}
