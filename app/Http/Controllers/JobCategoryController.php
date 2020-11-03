<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JobCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param int $itemsPerPage
     * @return Response
     */
    public function index(int $itemsPerPage = 15)
    {
        return response(JobCategory::paginate($itemsPerPage), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return response(JobCategory::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  JobCategory $jobCategory
     * @return Response
     */
    public function show(JobCategory $jobCategory)
    {
        return response($jobCategory, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param JobCategory $jobCategory
     * @return Response
     */
    public function update(Request $request, JobCategory $jobCategory)
    {
        $jobCategory->update($request->all());

        return response($jobCategory,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param JobCategory $jobCategory
     * @return Response
     * @throws Exception
     */
    public function destroy(JobCategory $jobCategory)
    {
        if($jobCategory->delete())
        {
            return response(['success' => 'true'], 200);
        }
        else
        {
            return response(['success' => 'false'], 200);
        }
    }

    /**
     * Get a listing of jobs given a category.
     *
     * @param JobCategory $jobCategory
     * @param int $itemsPerPage
     * @return Response
     */
    public function getJobs(JobCategory $jobCategory, int $itemsPerPage = 15)
    {
        return response($jobCategory->getJobs()->paginate($itemsPerPage), 200);
    }
}
