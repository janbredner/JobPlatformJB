<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\JobTagController;
use \App\Http\Controllers\JobController;
use \App\Http\Controllers\JobCategoryController;
use \App\Http\Controllers\CompanyController;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Job routes       ////////////////////////////////////////////////////////////////////////////

Route::get('jobs', [JobController::class, 'index']);
Route::get('jobs/{id}', [JobController::class, 'show']);
Route::post('jobs', [JobController::class, 'store']);
Route::put('jobs/{id}', [JobController::class, 'update']);
Route::delete('jobs/{id}', [JobController::class, 'destroy']);

// JobTag routes

Route::get('jobTags', [JobTagController::class, 'index']);
Route::get('jobTags/{jobTag}', [JobTagController::class, 'show']);
Route::post('jobTags', [JobTagController::class, 'store']);
Route::put('jobTags/{jobTag}', [JobTagController::class, 'update']);
Route::delete('jobTags/{jobTag}', [JobTagController::class, 'destroy']);

// JobCategory routes

Route::get('jobCategories', [JobCategoryController::class, 'index']);
Route::get('jobCategories/{id}', [JobCategoryController::class, 'show']);
Route::post('jobCategories', [JobCategoryController::class, 'store']);
Route::put('jobCategories/{id}', [JobCategoryController::class, 'update']);
Route::delete('jobCategories/{id}', [JobCategoryController::class, 'destroy']);

// Company routes   ////////////////////////////////////////////////////////////////////////////

Route::get('companies', [CompanyController::class, 'index']);
Route::get('companies/{id}', [CompanyController::class, 'show']);
Route::post('companies', [CompanyController::class, 'store']);
Route::put('companies/{id}', [CompanyController::class, 'update']);
Route::delete('companies/{id}', [CompanyController::class, 'destroy']);

// User routes      ////////////////////////////////////////////////////////////////////////////

Route::get('users',[UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::post('users',[UserController::class, 'store']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);


