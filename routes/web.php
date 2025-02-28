<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\Api\JobListController;

Route::get('joblists', [JobListController::class, 'index']);

use App\Http\Controllers\JobController;

Route::get('/', [JobController::class, 'index']);

use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
