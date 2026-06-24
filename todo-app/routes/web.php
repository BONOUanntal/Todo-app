<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);

Route::post('/tasks', [TaskController::class, 'store']);

Route::put('/tasks/{task}', [TaskController::class, 'update']);

Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete']);