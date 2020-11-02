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
Route::get('jobs/pages/{itemsPerPage}', [JobController::class, 'indexP']);
Route::get('jobs/{job}', [JobController::class, 'show']);
Route::post('jobs', [JobController::class, 'store']);
Route::put('jobs/{job}', [JobController::class, 'update']);
Route::delete('jobs/{job}', [JobController::class, 'destroy']);

// JobTag routes

Route::get('jobTags', [JobTagController::class, 'index']);
Route::get('jobTags/pages/{itemsPerPage}', [JobTagController::class, 'indexP']);
Route::get('jobTags/{jobTag}', [JobTagController::class, 'show']);
Route::post('jobTags', [JobTagController::class, 'store']);
Route::put('jobTags/{jobTag}', [JobTagController::class, 'update']);
Route::delete('jobTags/{jobTag}', [JobTagController::class, 'destroy']);

// JobCategory routes

Route::get('jobCategories', [JobCategoryController::class, 'index']);
Route::get('jobCategories/pages/{itemsPerPage}', [JobCategoryController::class, 'indexP']);
Route::get('jobCategories/{jobCategory}', [JobCategoryController::class, 'show']);
Route::post('jobCategories', [JobCategoryController::class, 'store']);
Route::put('jobCategories/{jobCategory}', [JobCategoryController::class, 'update']);
Route::delete('jobCategories/{jobCategory}', [JobCategoryController::class, 'destroy']);

// Company routes   ////////////////////////////////////////////////////////////////////////////

Route::get('companies', [CompanyController::class, 'index']);
Route::get('companies/pages/{itemsPerPage}', [CompanyController::class, 'indexP']);
Route::get('companies/{company}', [CompanyController::class, 'show']);
Route::post('companies', [CompanyController::class, 'store']);
Route::put('companies/{company}', [CompanyController::class, 'update']);
Route::delete('companies/{company}', [CompanyController::class, 'destroy']);

// User routes      ////////////////////////////////////////////////////////////////////////////

Route::get('users',[UserController::class, 'index']);
Route::get('users/pages/{itemsPerPage}',[UserController::class, 'indexP']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::post('users',[UserController::class, 'store']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);


