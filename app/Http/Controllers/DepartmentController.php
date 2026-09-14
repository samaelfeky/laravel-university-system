<?php
namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;
class DepartmentController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // get all data
        $departments=Department::all();
        // var_dump($departments);
        return view('departments.index',compact('departments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //
    }
    /**
     * Display the specified resource.
     */
    public function show($id){
        // findOrFail ===> exit==> data || not exist : 404
        $department=Department::findOrFail($id);
        // var_dump($department);
        return view('departments.show',compact('department'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department){
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department){
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department){
        //
    }
}