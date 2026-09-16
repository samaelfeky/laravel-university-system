<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json (
            Department::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Department_ID' => 'required|unique:departments,Department_ID',
            'Department_Name' => 'required|string|max:255',
        ]);
        $department = Department::create($validated);
        return response()->json(
            $department,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        return response()->json(
            $department
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);
        $validated = $request->validate([
            'Department_Name' => 'required|string|max:255',
        ]);
        $department->update($validated);
        return response()->json(
            $department
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return response()->json([
            'message' => 'Department deleted successfully.'
        ]);
    }
}
