<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobTag;
use Exception;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class JobTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $itemsPerPage
     * @return Response
     */
    public function index(int $itemsPerPage = 15)
    {
        return response(JobTag::paginate($itemsPerPage), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return response(JobTag::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  JobTag $jobTag
     * @return Response
     */
    public function show(JobTag $jobTag)
    {
        return response($jobTag, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  JobTag $jobTag
     * @return Response
     */
    public function update(Request $request, JobTag $jobTag)
    {
        $jobTag->update($request->all());

        return response($jobTag, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param JobTag $jobTag
     * @return Response
     * @throws Exception
     */
    public function destroy(JobTag $jobTag)
    {
        if($jobTag->delete())
        {
            return response(['success' => 'true'], 200);
        }
        else
        {
            return response(['success' => 'false'], 410);
        }
    }

    /**
     * Get all "Job" for a specific "JobTag"
     *
     * @param JobTag $jobTag
     * @param int $itemsPerPage
     * @return Response
     */
    public function getJobs(JobTag $jobTag, int $itemsPerPage = 15)
    {
        return response($jobTag->jobs()->paginate($itemsPerPage), 200);
    }
}
