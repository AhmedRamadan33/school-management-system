<?php

use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');



Route::middleware('auth:admin,teacher')->group(function () {
    Route::get('getClasses/{id}', [SectionController::class, 'getClasses'])->name('sections.getClasses');
    Route::get('getSection/{id}', [StudentController::class, 'getSection'])->name('students.getSection');
});


Route::middleware('auth:admin,teacher,student,parent')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('index', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });
});
