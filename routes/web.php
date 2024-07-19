<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');

// routes pour student
Route::get('/student', [StudentController::class, 'showLoginForm'])->name('student');
