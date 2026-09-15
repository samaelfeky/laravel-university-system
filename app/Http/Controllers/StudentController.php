<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'department',
            'user',
            'courses',
            'phones',
        ])->get();

        return view(
            'students.index',
            compact('students')
        );
    }

    public function create()
    {
        $departments = Department::all();
        $courses = Course::all();

        return view(
            'students.create',
            compact(
                'departments',
                'courses'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'University_ID' => 'required|unique:students,University_ID',
            'name' => 'required|string|max:255',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'Department_ID' => 'required|exists:departments,Department_ID',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::with([
            'department',
            'user',
            'courses.teachers',
            'phones',
        ])->findOrFail($id);

        $availableCourses = Course::whereNotIn(
            'Course_ID',
            $student->courses->pluck('Course_ID')
        )->get();

        return view(
            'students.show',
            compact(
                'student',
                'availableCourses'
            )
        );
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $departments = Department::all();
        $courses = Course::all();

        return view(
            'students.edit',
            compact(
                'student',
                'departments',
                'courses'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'Department_ID' => 'required|exists:departments,Department_ID',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $student->update($validated);

        return redirect()
            ->route(
                'students.show',
                $student->University_ID
            )
            ->with(
                'success',
                'Student updated successfully.'
            );
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with(
                'success',
                'Student deleted successfully.'
            );
    }

    public function addCourse(
        Request $request,
        $student
    ) {
        $student = Student::findOrFail($student);

        $validated = $request->validate([
            'Course_ID' => 'required|exists:courses,Course_ID',
            'Semester' => 'required|string|max:255',
        ]);

        $student->courses()->syncWithoutDetaching([
            $validated['Course_ID'] => [
                'Semester' => $validated['Semester'],
            ],
        ]);

        return redirect()
            ->route(
                'students.show',
                $student->University_ID
            )
            ->with(
                'success',
                'Course added successfully.'
            );
    }

    public function removeCourse(
        $student,
        $course
    ) {
        $student = Student::findOrFail($student);

        $student->courses()->detach($course);

        return redirect()
            ->route(
                'students.show',
                $student->University_ID
            )
            ->with(
                'success',
                'Course removed successfully.'
            );
    }

    public function addPhone(
        Request $request,
        $student
    ) {
        $student = Student::findOrFail($student);

        $validated = $request->validate([
            'Phone_Number' => 'required|string|max:255',
        ]);

        $student->phones()->create([
            'University_ID' => $student->University_ID,
            'Phone_Number' => $validated['Phone_Number'],
        ]);

        return redirect()
            ->route(
                'students.show',
                $student->University_ID
            )
            ->with(
                'success',
                'Phone added successfully.'
            );
    }

    public function removePhone(
        $student,
        $phoneNumber
    ) {
        $student = Student::findOrFail($student);

        $student->phones()
            ->where('Phone_Number', $phoneNumber)
            ->delete();

        return redirect()
            ->route(
                'students.show',
                $student->University_ID
            )
            ->with(
                'success',
                'Phone removed successfully.'
            );
    }
}