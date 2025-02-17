<?php

use App\Http\Controllers\Auth\LoginTeacherController;
use App\Http\Controllers\TeacherDashboard\AttendanceController;
use App\Http\Controllers\TeacherDashboard\OnlineSessionController;
use App\Http\Controllers\TeacherDashboard\QuestionController;
use App\Http\Controllers\TeacherDashboard\QuizController;
use App\Http\Controllers\TeacherDashboard\QuizDegreeController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:teacher')->group(function () {
    Route::get('dashboard/teacher', [LoginTeacherController::class, 'create'])->name('dashboard.teacher');

    // === Attendance Routes ===
    Route::prefix('attendance')->group(function () {
        Route::get('index', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('create/{id}', [AttendanceController::class, 'create'])->name('attendance.create');
        Route::post('store', [AttendanceController::class, 'store'])->name('attendance.store');
        Route::get('history', [AttendanceController::class, 'history'])->name('attendance.history');
        Route::post('update/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
    });

    // =======================  Quizzes Routes  ==========================================
    Route::prefix('quizzes')->group(function () {
        Route::get('index', [QuizController::class, 'index'])->name('quizzes.index');
        Route::get('create', [QuizController::class, 'create'])->name('quizzes.create');
        Route::post('store', [QuizController::class, 'store'])->name('quizzes.store');
        Route::get('edit/{id}', [QuizController::class, 'edit'])->name('quizzes.edit');
        Route::post('update/{id}', [QuizController::class, 'update'])->name('quizzes.update');
        Route::post('destroy/{id}', [QuizController::class, 'destroy'])->name('quizzes.destroy');
    });

    // =======================  Questions Routes  ==========================================
    Route::prefix('questions')->group(function () {
        Route::get('show/{id}', [QuestionController::class, 'show'])->name('questions.show');
        Route::get('create/{id}', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('store/{id}', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::post('update/{id}', [QuestionController::class, 'update'])->name('questions.update');
        Route::post('destroy/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    });

    // =======================  Online Session Routes  ==========================================
    Route::prefix('onlineSessions')->group(function () {
        Route::get('index', [OnlineSessionController::class, 'index'])->name('onlineSessions.index');
        Route::get('create', [OnlineSessionController::class, 'create'])->name('onlineSessions.create');
        Route::post('store', [OnlineSessionController::class, 'store'])->name('onlineSessions.store');
        Route::get('edit/{id}', [OnlineSessionController::class, 'edit'])->name('onlineSessions.edit');
        Route::post('update/{id}', [OnlineSessionController::class, 'update'])->name('onlineSessions.update');
        Route::post('destroy/{id}', [OnlineSessionController::class, 'destroy'])->name('onlineSessions.destroy');
    });

    // =======================  Quizzes Degrees Routes  ==========================================
    Route::prefix('quizzesDegrees')->group(function () {
        Route::get('index', [QuizDegreeController::class, 'index'])->name('quizzesDegrees.index');
        Route::get('show/{id}', [QuizDegreeController::class, 'show'])->name('quizzesDegrees.show');
    });
});

require __DIR__ . '/auth.php';
