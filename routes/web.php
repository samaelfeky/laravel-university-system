<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/map/{tableName}', [MapController::class, 'show'])->name('map.show');