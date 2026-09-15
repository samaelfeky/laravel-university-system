<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MapController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', [MapController::class, 'index'])
    ->name('map.index');

Route::get('/map/{tableName}', [MapController::class, 'show'])
    ->name('map.show');


/*
|--------------------------------------------------------------------------
| Students
|--------------------------------------------------------------------------
*/

Route::resource('students', StudentController::class);

Route::post(
    '/students/{student}/courses',
    [StudentController::class, 'addCourse']
)->name('students.courses.add');

Route::delete(
    '/students/{student}/courses/{course}',
    [StudentController::class, 'removeCourse']
)->name('students.courses.remove');

Route::post(
    '/students/{student}/phones',
    [StudentController::class, 'addPhone']
)->name('students.phones.add');

Route::delete(
    '/students/{student}/phones/{phoneNumber}',
    [StudentController::class, 'removePhone']
)->name('students.phones.remove');


/*
|--------------------------------------------------------------------------
| Teachers
|--------------------------------------------------------------------------
*/

Route::resource('teachers', TeacherController::class);

Route::post(
    '/teachers/{teacher}/courses',
    [TeacherController::class, 'addCourse']
)->name('teachers.courses.add');

Route::delete(
    '/teachers/{teacher}/courses/{course}',
    [TeacherController::class, 'removeCourse']
)->name('teachers.courses.remove');


/*
|--------------------------------------------------------------------------
| Courses
|--------------------------------------------------------------------------
*/

Route::resource('courses', CourseController::class);


/*
|--------------------------------------------------------------------------
| Departments
|--------------------------------------------------------------------------
*/

Route::resource('departments', DepartmentController::class);


/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class);