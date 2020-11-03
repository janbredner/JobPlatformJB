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
// basic routes
Route::get('jobs/{itemsPerPage?}', [JobController::class, 'index']);
Route::get('jobs/show/{job}', [JobController::class, 'show']);
Route::post('jobs', [JobController::class, 'store']);
Route::put('jobs/{job}', [JobController::class, 'update']);
Route::delete('jobs/{job}', [JobController::class, 'destroy']);
// relationship routes
Route::get('jobs/category/{job}', [JobController::class, 'getCategory']);
Route::get('jobs/company/{job}', [JobController::class, 'getCompany']);
Route::get('jobs/user/{job}', [JobController::class, 'getUser']);
Route::get('jobs/jobTags/{job}/{itemsPerPage?}', [JobController::class , 'getTags']);

// JobTag routes
// basic routes
Route::get('jobTags/{itemsPerPage?}', [JobTagController::class, 'index']);
Route::get('jobTags/show/{jobTag}', [JobTagController::class, 'show']);
Route::post('jobTags', [JobTagController::class, 'store']);
Route::put('jobTags/{jobTag}', [JobTagController::class, 'update']);
Route::delete('jobTags/{jobTag}', [JobTagController::class, 'destroy']);
// relationship routes
Route::get('jobTags/jobs/{jobTag}/{itemsPerPage?}', [JobTagController::class , 'getJobs']);

// JobCategory routes
// basic routes
Route::get('jobCategories/{itemsPerPage?}', [JobCategoryController::class, 'index']);
Route::get('jobCategories/show/{jobCategory}', [JobCategoryController::class, 'show']);
Route::post('jobCategories', [JobCategoryController::class, 'store']);
Route::put('jobCategories/{jobCategory}', [JobCategoryController::class, 'update']);
Route::delete('jobCategories/{jobCategory}', [JobCategoryController::class, 'destroy']);
// relationship routes
Route::get('jobCategories/getJobs/{jobCategory}/{itemsPerPage?}', [JobCategoryController::class, 'getJobs']);

// Company routes   ////////////////////////////////////////////////////////////////////////////
// basic routes
Route::get('companies/{itemsPerPage?}', [CompanyController::class, 'index']);
Route::get('companies/show/{company}', [CompanyController::class, 'show']);
Route::post('companies', [CompanyController::class, 'store']);
Route::put('companies/{company}', [CompanyController::class, 'update']);
Route::delete('companies/{company}', [CompanyController::class, 'destroy']);
// relationship routes
Route::get('companies/getJobs/{company}/{itemsPerPage?}', [CompanyController::class, 'getJobs']);
Route::get('companies/getCreator/{company}', [CompanyController::class, 'getCreator']);
Route::get('companies/getUsers/{company}', [CompanyController::class, 'getUsers']);

// User routes      ////////////////////////////////////////////////////////////////////////////
// basic routes
Route::get('users/{itemsPerPage?}',[UserController::class, 'index']);
Route::get('users/show/{user}', [UserController::class, 'show']);
Route::post('users',[UserController::class, 'store']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);
// relationship routes
Route::get('users/getJobs/{user}/{itemsPerPage?}', [UserController::class, 'getJobs']);
Route::get('users/getCreatedCompanies/{user}/{itemsPerPage?}', [UserController::class, 'getCreatedCompanies']);
Route::get('users/getCompanies/{user}/{itemsPerPage?}', [UserController::class, 'getCompanies']);


