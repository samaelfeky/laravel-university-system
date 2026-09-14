<?php
namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
class CourseController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // get all data
        $courses=Course::all();
        // var_dump($courses);
        return view('courses.index',compact('courses'));
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
        $course=Course::findOrFail($id);
        // var_dump($course);
        return view('courses.show',compact('course'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course){
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course){
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course){
        //
    }
}