<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ProjectMemberController;
use App\Http\Controllers\Api\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::prefix('/auth')->middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);

});
Route::middleware('auth:api')->group(function () {
    Route::apiResource('/projects', ProjectController::class);
  Route::apiResource('projects.tasks', TaskController::class);
  Route::apiResource('projects.users', ProjectMemberController::class);
    Route::apiResource('tasks.comments', CommentController::class);



});