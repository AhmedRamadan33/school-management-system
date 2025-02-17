<?php

use App\Http\Controllers\Auth\LoginStudentController;
use App\Http\Controllers\StudentDashboard\AttendanceReportController;
use App\Http\Controllers\StudentDashboard\ExamController;
use App\Http\Controllers\StudentDashboard\FinalMarkController;
use App\Http\Controllers\StudentDashboard\StudentInfoController;
use App\Http\Controllers\StudentDashboard\StudentSessionController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:student')->group(function () {
    Route::get('dashboard/student', [LoginStudentController::class, 'create'])->name('dashboard.student');

    // =======================  exams Routes  ==========================================
    Route::prefix('exams')->group(function () {
        Route::get('index', [ExamController::class, 'index'])->name('exams.index');
        Route::get('show/{id}', [ExamController::class, 'show'])->name('exams.show');
    });

    // =======================  Final Mark Routes  ==========================================
    Route::prefix('finalDegrees')->group(function () {
        Route::get('index', [FinalMarkController::class, 'index'])->name('finalDegrees.index');
        Route::get('show/{id}', [FinalMarkController::class, 'show'])->name('finalDegrees.show');
    });

    // =======================  Attendance Report Routes  ==========================================
    Route::prefix('attendanceReport')->group(function () {
        Route::get('index', [AttendanceReportController::class, 'index'])->name('attendanceReport.index');
        Route::get('show/{id}', [AttendanceReportController::class, 'show'])->name('attendanceReport.show');
    });

    // =======================  student Info Routes  ==========================================
    Route::prefix('studentInfo')->group(function () {
        Route::get('index', [StudentInfoController::class, 'index'])->name('studentInfo.index');
    });

    // =======================  student session Routes  ==========================================
    Route::prefix('studentSession')->group(function () {
        Route::get('index', [StudentSessionController::class, 'index'])->name('studentSession.index');
    });
});

require __DIR__ . '/auth.php';
