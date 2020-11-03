<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $itemsPerPage
     * @return Response
     */
    public function index(int $itemsPerPage = 15)
    {
        return response(Job::paginate($itemsPerPage), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return response(Job::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Job  $job
     * @return Response
     */
    public function show(Job  $job)
    {
        return response($job, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Job  $job
     * @return Response
     */
    public function update(Request $request, Job  $job)
    {

        $job->update($request->all());

        return response($job,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return Response
     * @throws Exception
     */
    public function destroy(Job  $job)
    {
        if($job->delete())
        {
            return response(['success' => 'true'], 200);
        }
        else
        {
            return response(['success' => 'false'], 410);
        }
    }

    /**
     * Get a "Category" given a specific "Job"
     *
     * @param Job $job
     * @return Response
     */
    public function getCategory(Job $job)
    {
        return response($job->category()->first(), 200);
    }

    /**
     * Get a "Company" given a specific "Job"
     *
     * @param Job $job
     * @return Response
     */
    public function getCompany(Job $job)
    {
        return response($job->company()->first(), 200);
    }

    /**
     * Get the "User" (the creator) for a specific "Job"
     *
     * @param Job $job
     * @return Response
     */
    public function getUser(Job $job)
    {
        return response($job->user()->first(), 200);
    }

    /**
     * Get all "JobTag" for a specific "Job"
     *
     * @param Job $job
     * @param int $itemsPerPage
     * @return Response
     */
    public function getTags(Job $job, int $itemsPerPage = 15)
    {
        return response($job->jobTags()->paginate($itemsPerPage), 200);
    }
}
