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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Job routes       ////////////////////////////////////////////////////////////////////////////
// basic routes
Route::group(['middleware' => 'auth:sanctum'] , function(){


    Route::apiResources([
        'cars' => 'App\Http\Controllers\CarController',
    ]);

    //route::route::ressorces
    Route::get('jobs', [JobController::class, 'index']);
    Route::put('jobs/{job}', [JobController::class, 'update']);
    Route::get('jobs/{job}', [JobController::class, 'show']);
    Route::post('jobs', [JobController::class, 'store']);
    Route::delete('jobs/{job}', [JobController::class, 'destroy']);
    // relationship routes
    Route::get('jobs/category/{job}', [JobController::class, 'getCategory']);
    Route::get('jobs/company/{job}', [JobController::class, 'getCompany']);
    Route::get('jobs/user/{job}', [JobController::class, 'getUser']);
    // routing ändern job-tags - nach schauen in der Doku
    Route::get('jobs/jobTags/{job}', [JobController::class , 'getTags']);

    // JobTag routes
    // basic routes
    Route::get('jobTags', [JobTagController::class, 'index']);
    Route::get('jobTags/{jobTag}', [JobTagController::class, 'show'])->middleware('can:view,jobTag');
    Route::post('jobTags', [JobTagController::class, 'store'])->middleware('can:create,App\Models\JobTag');
    Route::put('jobTags/{jobTag}', [JobTagController::class, 'update'])->middleware('can:update,jobTag');
    Route::delete('jobTags/{jobTag}', [JobTagController::class, 'destroy'])->middleware('can:delete,jobTag');
    // relationship routes
    Route::get('jobTags/jobs/{jobTag}', [JobTagController::class , 'getJobs']);

    // JobCategory routes
    // basic routes
    Route::get('jobCategories', [JobCategoryController::class, 'index']);
    Route::get('jobCategories/{jobCategory}', [JobCategoryController::class, 'show'])->middleware('can:view,jobCategory');
    Route::post('jobCategories', [JobCategoryController::class, 'store'])->middleware('can:create,App\Models\JobCategory');;
    Route::put('jobCategories/{jobCategory}', [JobCategoryController::class, 'update'])->middleware('can:update,jobCategory');;
    Route::delete('jobCategories/{jobCategory}', [JobCategoryController::class, 'destroy'])->middleware('can:delete,jobCategory');;
    // relationship routes
    Route::get('jobCategories/getJobs/{jobCategory}', [JobCategoryController::class, 'getJobs']);

    // Company routes   ////////////////////////////////////////////////////////////////////////////
    // basic routes
    Route::get('companies', [CompanyController::class, 'index']);
    Route::get('companies/{company}', [CompanyController::class, 'show']);
    Route::post('companies', [CompanyController::class, 'store']);
    Route::put('companies/{company}', [CompanyController::class, 'update']);
    Route::delete('companies/{company}', [CompanyController::class, 'destroy']);
    // relationship routes
    Route::get('companies/getJobs/{company}', [CompanyController::class, 'getJobs']);
    Route::get('companies/getCreator/{company}', [CompanyController::class, 'getCreator']);
    Route::get('companies/getUsers/{company}', [CompanyController::class, 'getUsers']);

});
// User routes      ////////////////////////////////////////////////////////////////////////////
// basic routes
Route::get('users',[UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::post('users',[UserController::class, 'store']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);
// relationship routes
Route::get('users/getJobs/{user}', [UserController::class, 'getJobs']);
Route::get('users/getCreatedCompanies/{user}', [UserController::class, 'getCreatedCompanies']);
Route::get('users/getCompanies/{user}', [UserController::class, 'getCompanies']);



Route::post('login', [UserController::class, 'logIn']);
