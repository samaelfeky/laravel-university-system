<?php
namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
class TeacherController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // get all data
        $teachers=Teacher::all();
        // var_dump($teachers);
        return view('teachers.index',compact('teachers'));
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
        $teacher=Teacher::findOrFail($id);
        // var_dump($teacher);
        return view('teachers.show',compact('teacher'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher){
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher){
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher){
        //
    }
}