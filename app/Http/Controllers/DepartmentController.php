<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Chairman;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with([
            'students',
            'teachers',
            'courses',
            'chairman',
        ])->get();

        return view(
            'departments.index',
            compact('departments')
        );
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Department_ID' => 'required|unique:departments,Department_ID',
            'Department_Name' => 'required|string|max:255',
        ]);

        Department::create($validated);

        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'Department created successfully.'
            );
    }

    public function show($id)
    {
        $department = Department::with([
            'students',
            'teachers',
            'courses',
            'chairman',
        ])->findOrFail($id);

        return view(
            'departments.show',
            compact('department')
        );
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view(
            'departments.edit',
            compact('department')
        );
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'Department_Name' => 'required|string|max:255',
        ]);

        $department->update($validated);

        return redirect()
            ->route(
                'departments.show',
                $department->Department_ID
            )
            ->with(
                'success',
                'Department updated successfully.'
            );
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'Department deleted successfully.'
            );
    }
}