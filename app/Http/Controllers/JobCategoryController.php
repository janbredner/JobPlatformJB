<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Policies\JobCategoryPolicy;
use Exception;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class JobCategoryController extends Controller
{
    public function __construct()
    {
       // $this->authorizeResource(JobCategory::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(JobCategory::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, JobCategory::validationRules());

        return response(JobCategory::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param JobCategory $jobCategory
     * @return Response
     */
    public function show(JobCategory $jobCategory)
    {
        return response($jobCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param JobCategory $jobCategory
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, JobCategory $jobCategory)
    {
        $data = $this->validate($request, JobCategory::validationRules());

        $status = $jobCategory->update($data);

        return response(['success' => $status]);
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
        return response(['success' => $jobCategory->delete()]);
    }

    /**
     * Get a listing of jobs given a category.
     *
     * @param JobCategory $jobCategory
     * @return Response
     */
    public function getJobs(JobCategory $jobCategory)
    {
        return response($jobCategory->getJobs()->paginate());
    }
}
