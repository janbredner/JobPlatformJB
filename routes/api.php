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

Route::get('jobs/{itemsPerPage?}', [JobController::class, 'index']);
Route::get('jobs/{job}', [JobController::class, 'show']);
Route::post('jobs', [JobController::class, 'store']);
Route::put('jobs/{job}', [JobController::class, 'update']);
Route::delete('jobs/{job}', [JobController::class, 'destroy']);

// JobTag routes

Route::get('jobTags/{itemsPerPage?}', [JobTagController::class, 'index']);
Route::get('jobTags/show/{jobTag}', [JobTagController::class, 'show']);
Route::post('jobTags', [JobTagController::class, 'store']);
Route::put('jobTags/{jobTag}', [JobTagController::class, 'update']);
Route::delete('jobTags/{jobTag}', [JobTagController::class, 'destroy']);

// JobCategory routes

Route::get('jobCategories/{itemsPerPage?}', [JobCategoryController::class, 'index']);
Route::get('jobCategories/show/{jobCategory}', [JobCategoryController::class, 'show']);
Route::get('jobCategories/getJobs/{jobCategory}/{itemsPerPage?}', [JobCategoryController::class, 'getJobs']);
Route::post('jobCategories', [JobCategoryController::class, 'store']);
Route::put('jobCategories/{jobCategory}', [JobCategoryController::class, 'update']);
Route::delete('jobCategories/{jobCategory}', [JobCategoryController::class, 'destroy']);

// Company routes   ////////////////////////////////////////////////////////////////////////////

Route::get('companies/{itemsPerPage?}', [CompanyController::class, 'index']);
Route::get('companies/show/{company}', [CompanyController::class, 'show']);
Route::post('companies', [CompanyController::class, 'store']);
Route::put('companies/{company}', [CompanyController::class, 'update']);
Route::delete('companies/{company}', [CompanyController::class, 'destroy']);

// User routes      ////////////////////////////////////////////////////////////////////////////

Route::get('users/{itemsPerPage?}',[UserController::class, 'index']);
Route::get('users/show/{user}', [UserController::class, 'show']);
Route::post('users',[UserController::class, 'store']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);


