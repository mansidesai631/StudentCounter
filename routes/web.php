<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('/');
Route::get('/export', [DashboardController::class, 'export'])->name('dashboard.export');

/**
* Subject Routes
*/
Route::group(['prefix' => 'subjects'], function() {
    Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/create', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/{subject}/show', [SubjectController::class, 'show'])->name('subjects.show');
    Route::get('/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::patch('/{subject}/update', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/{subject}/delete', [SubjectController::class, 'destroy'])->name('subjects.destroy');
});

/**
* Student Routes
*/
Route::group(['prefix' => 'students'], function() {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/create', [StudentController::class, 'store'])->name('students.store');
    Route::get('/{student}/show', [StudentController::class, 'show'])->name('students.show');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::patch('/{student}/update', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/{student}/delete', [StudentController::class, 'destroy'])->name('students.destroy');
});

/**
* Teacher Routes
*/
Route::group(['prefix' => 'teachers'], function() {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/create', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/{teacher}/show', [TeacherController::class, 'show'])->name('teachers.show');
    Route::get('/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::patch('/{teacher}/update', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/{teacher}/delete', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});

/**
* Teacher Routes
*/
Route::group(['prefix' => 'assigns'], function() {
    Route::get('/', [AssignController::class, 'index'])->name('assigns.index');
    Route::get('/create', [AssignController::class, 'create'])->name('assigns.create');
    Route::post('/create', [AssignController::class, 'store'])->name('assigns.store');
    Route::get('/{assign}/show', [AssignController::class, 'show'])->name('assigns.show');
    Route::get('/{assign}/edit', [AssignController::class, 'edit'])->name('assigns.edit');
    Route::patch('/{assign}/update', [AssignController::class, 'update'])->name('assigns.update');
    Route::delete('/{assign}/delete', [AssignController::class, 'destroy'])->name('assigns.destroy');
});