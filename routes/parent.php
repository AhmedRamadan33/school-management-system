<?php

use App\Http\Controllers\Auth\LoginParentController;
use App\Http\Controllers\ParentDashboard\sonAttendanceController;
use App\Http\Controllers\ParentDashboard\SonFeeController;
use App\Http\Controllers\ParentDashboard\SonFinalDegreeController;
use App\Http\Controllers\ParentDashboard\SonQuizDegreeController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:parent')->group(function () {
    Route::get('dashboard/parent', [LoginParentController::class, 'create'])->name('dashboard.parent');

    // =======================  Son Final Degree Routes  ==========================================
    Route::prefix('sons')->group(function () {
        Route::get('index', [SonFinalDegreeController::class, 'index'])->name('sons.index');
        Route::get('degrees/{id}', [SonFinalDegreeController::class, 'degrees'])->name('sonsDegrees.index');
        Route::get('showDegrees/{id}/{st_id}', [SonFinalDegreeController::class, 'showDegrees'])->name('sonsDegrees.show');
    });

     // =======================  Son Quizzes Degree Routes  ==========================================
     Route::prefix('sonsQuizzes')->group(function () {
        Route::get('index', [SonQuizDegreeController::class, 'index'])->name('sonsQuizzes.index');
        Route::get('degrees/{id}', [SonQuizDegreeController::class, 'degrees'])->name('sonsQuizzes.degrees');
    });
    
    // =======================  Son fees Routes  ==========================================
    Route::prefix('sonFee')->group(function () {
        Route::get('index', [SonFeeController::class, 'index'])->name('sonFee.index');
        Route::get('show/{id}', [SonFeeController::class, 'show'])->name('sonFee.show');
    });

     // =======================  Son Attendance Routes  ==========================================
     Route::prefix('sonAttendance')->group(function () {
        Route::get('index', [sonAttendanceController::class, 'index'])->name('sonAttendance.index');
        Route::post('search', [sonAttendanceController::class, 'search'])->name('sonAttendance.search');
    });

});


require __DIR__ . '/auth.php';
