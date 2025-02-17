<?php

use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Dashboard\ClassroomController;
use App\Http\Controllers\Dashboard\FeeController;
use App\Http\Controllers\Dashboard\GradeController;
use App\Http\Controllers\Dashboard\GraduatedController;
use App\Http\Controllers\Dashboard\LibraryController;
use App\Http\Controllers\Dashboard\MarkController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ProcessingFeeController;
use App\Http\Controllers\Dashboard\PromotionController;
use App\Http\Controllers\Dashboard\ReceiptController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Livewire\Calendar;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Route::middleware('auth:admin')->group(function () {
    Route::get('dashboard/admin', [LoginAdminController::class, 'create'])->name('dashboard');

    // =======================  Grades Routes  ==========================================
    Route::prefix('grades')->group(function () {
        Route::get('index', [GradeController::class, 'index'])->name('grades.index');
        Route::post('store', [GradeController::class, 'store'])->name('grades.store');
        Route::post('update/{id}', [GradeController::class, 'update'])->name('grades.update');
        Route::post('destroy/{id}', [GradeController::class, 'destroy'])->name('grades.destroy');
    });
    // =======================  Classrooms Routes  ==========================================
    Route::prefix('classrooms')->group(function () {
        Route::get('index', [ClassroomController::class, 'index'])->name('classrooms.index');
        Route::post('store', [ClassroomController::class, 'store'])->name('classrooms.store');
        Route::post('update/{id}', [ClassroomController::class, 'update'])->name('classrooms.update');
        Route::post('destroy/{id}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');
    });

    // =======================  Sections Routes  ==========================================
    Route::prefix('sections')->group(function () {
        Route::get('index', [SectionController::class, 'index'])->name('sections.index');
        Route::post('store', [SectionController::class, 'store'])->name('sections.store');
        Route::post('update/{id}', [SectionController::class, 'update'])->name('sections.update');
        Route::post('destroy/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');
    });

    // =======================  Teacher Routes  ==========================================
    Route::prefix('teachers')->group(function () {
        Route::get('index', [TeacherController::class, 'index'])->name('teachers.index');
        Route::get('create', [TeacherController::class, 'create'])->name('teachers.create');
        Route::post('store', [TeacherController::class, 'store'])->name('teachers.store');
        Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('teachers.edit');
        Route::post('update/{id}', [TeacherController::class, 'update'])->name('teachers.update');
        Route::post('destroy/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    });

    // =======================  Parents Routes  ==========================================
    Route::prefix('parents')->group(function () {
        Route::view('index', 'livewire.parent.index')->name('parents.index');
    });

    // =======================  Students Routes  ==========================================
    Route::prefix('students')->group(function () {
        Route::get('index', [StudentController::class, 'index'])->name('students.index');
        Route::get('create', [StudentController::class, 'create'])->name('students.create');
        Route::post('store', [StudentController::class, 'store'])->name('students.store');
        Route::get('show/{id}', [StudentController::class, 'show'])->name('students.show');
        Route::get('edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
        Route::post('update/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::get('download/{id}/{name}', [StudentController::class, 'download'])->name('students.download');
        Route::post('destroy/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
        Route::post('delete_file/{id}', [StudentController::class, 'delete_file'])->name('students.delete_file');
    });

    // =======================  marks Routes  ==========================================
    Route::prefix('marks')->group(function () {
        Route::get('create/{id}', [MarkController::class, 'create'])->name('marks.create');
        Route::post('store/{id}', [MarkController::class, 'store'])->name('marks.store');
    });

    // =======================  Promotion Routes  ==========================================
    Route::prefix('promotion')->group(function () {
        Route::get('index', [PromotionController::class, 'index'])->name('promotion.index');
        Route::get('create', [PromotionController::class, 'create'])->name('promotion.create');
        Route::post('store', [PromotionController::class, 'store'])->name('promotion.store');
    });
    // =======================  Graduated Routes  ==========================================
    Route::prefix('graduated')->group(function () {
        Route::get('index', [GraduatedController::class, 'index'])->name('graduated.index');
        Route::get('create', [GraduatedController::class, 'create'])->name('graduated.create');
        Route::post('softDelete', [GraduatedController::class, 'softDelete'])->name('graduated.softDelete');
        Route::post('returnStudent/{id}', [GraduatedController::class, 'returnStudent'])->name('graduated.returnStudent');
        Route::post('destroy/{id}', [GraduatedController::class, 'destroy'])->name('graduated.destroy');
    });


    // =======================  subjects Routes  ==========================================
    Route::prefix('subjects')->group(function () {
        Route::get('index', [SubjectController::class, 'index'])->name('subjects.index');
        Route::get('create', [SubjectController::class, 'create'])->name('subjects.create');
        Route::post('store', [SubjectController::class, 'store'])->name('subjects.store');
        Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('subjects.edit');
        Route::post('update/{id}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::post('destroy/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
    });


    // =======================  fees Routes  ==========================================
    Route::prefix('fees')->group(function () {
        Route::get('index', [FeeController::class, 'index'])->name('fees.index');
        Route::get('create', [FeeController::class, 'create'])->name('fees.create');
        Route::post('store', [FeeController::class, 'store'])->name('fees.store');
        Route::get('show/{id}', [FeeController::class, 'show'])->name('fees.show');
        Route::post('destroy/{id}', [FeeController::class, 'destroy'])->name('fees.destroy');
    });

    // =======================  receipts Routes  ==========================================
    Route::prefix('receipts')->group(function () {
        Route::get('index', [ReceiptController::class, 'index'])->name('receipts.index');
        Route::get('create/{id}', [ReceiptController::class, 'create'])->name('receipts.create');
        Route::post('store/{id}', [ReceiptController::class, 'store'])->name('receipts.store');
        Route::get('edit/{id}', [ReceiptController::class, 'edit'])->name('receipts.edit');
        Route::post('update/{id}', [ReceiptController::class, 'update'])->name('receipts.update');
        Route::post('destroy/{id}', [ReceiptController::class, 'destroy'])->name('receipts.destroy');
    });

    // =======================  payments Routes  ==========================================
    Route::prefix('payments')->group(function () {
        Route::get('index', [PaymentController::class, 'index'])->name('payments.index');
        Route::get('create/{id}', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('store/{id}', [PaymentController::class, 'store'])->name('payments.store');
        Route::get('edit/{id}', [PaymentController::class, 'edit'])->name('payments.edit');
        Route::post('update/{id}', [PaymentController::class, 'update'])->name('payments.update');
        Route::post('destroy/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    });

    // =======================  processingFee Routes  ==========================================
    Route::prefix('processingFee')->group(function () {
        Route::get('index', [ProcessingFeeController::class, 'index'])->name('processingFee.index');
        Route::get('create/{id}', [ProcessingFeeController::class, 'create'])->name('processingFee.create');
        Route::post('store/{id}', [ProcessingFeeController::class, 'store'])->name('processingFee.store');
        Route::get('edit/{id}', [ProcessingFeeController::class, 'edit'])->name('processingFee.edit');
        Route::post('update/{id}', [ProcessingFeeController::class, 'update'])->name('processingFee.update');
        Route::post('destroy/{id}', [ProcessingFeeController::class, 'destroy'])->name('processingFee.destroy');
    });

    // =======================  library Routes  ==========================================
    Route::prefix('library')->group(function () {
        Route::get('index', [LibraryController::class, 'index'])->name('library.index');
        Route::get('create', [LibraryController::class, 'create'])->name('library.create');
        Route::post('store', [LibraryController::class, 'store'])->name('library.store');
        Route::get('edit/{id}', [LibraryController::class, 'edit'])->name('library.edit');
        Route::post('update/{id}', [LibraryController::class, 'update'])->name('library.update');
        Route::post('destroy/{id}', [LibraryController::class, 'destroy'])->name('library.destroy');
        Route::get('download/{imageable_id}/{name}', [LibraryController::class, 'download'])->name('library.download');
    });

    // =======================  Calendar Routes  ==========================================
    Livewire::component('calendar', Calendar::class);
});

require __DIR__ . '/auth.php';
