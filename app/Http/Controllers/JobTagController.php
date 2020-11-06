<?php

namespace App\Http\Controllers;

use App\Models\JobTag;
use Exception;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class JobTagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(JobTag::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(JobTag::paginate());
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
        $data = $this->validate($request, JobTag::validationRules());

        return response(JobTag::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  JobTag $jobTag
     * @return Response
     */
    public function show(JobTag $jobTag)
    {
        return response($jobTag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param JobTag $jobTag
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, JobTag $jobTag)
    {
        $data = $this->validate($request, JobTag::validationRules());

        $status = $jobTag->update($data);

        return response(['success' => $status]);
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
        return response(['success' => $jobTag->delete()]);
    }

    /**
     * Get all "Job" for a specific "JobTag"
     *
     * @param JobTag $jobTag
     * @return Response
     */
    public function getJobs(JobTag $jobTag)
    {
        return response($jobTag->jobs()->paginate());
    }
}
