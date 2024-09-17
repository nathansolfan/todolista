<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// index method from controller
Route::get('/', [TaskController::class, 'index']);

// Route::get('/create', function () {
//     return view('create');
// });

Route::resource('tasks', TaskController::class);
