<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Auth\LoginParentController;
use App\Http\Controllers\Auth\LoginStudentController;
use App\Http\Controllers\Auth\LoginTeacherController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// login user route
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
// end login user route

// ===================== Start (Login/logout) admin route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/admin', [LoginAdminController::class, 'store'])->name('login.admin');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('logout/admin', [LoginAdminController::class, 'destroy'])->name('logout.admin');
});
// ===================== End (Login/logout) admin route  ========================



// ===================== Start (Login/logout) parent route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/parent', [LoginParentController::class, 'store'])->name('login.parent');
});

Route::middleware('auth:parent')->group(function () {
    Route::post('logout/parent', [LoginParentController::class, 'destroy'])->name('logout.parent');
});
// ===================== End (Login/logout) parent route  ========================


// ===================== Start (Login/logout) teacher route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/teacher', [LoginTeacherController::class, 'store'])->name('login.teacher');
});
Route::middleware('auth:teacher')->group(function () {
    Route::post('logout/teacher', [LoginTeacherController::class, 'destroy'])->name('logout.teacher');
});
// ===================== End (Login/logout) teacher route  ========================


// ===================== Start (Login/logout) student route  ========================
Route::middleware('guest')->group(function () {
    Route::post('login/student', [LoginStudentController::class, 'store'])->name('login.student');
});
Route::middleware('auth:student')->group(function () {
    Route::post('logout/student', [LoginStudentController::class, 'destroy'])->name('logout.student');
});
// ===================== End (Login/logout) student route  ========================