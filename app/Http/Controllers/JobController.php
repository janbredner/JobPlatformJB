<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobJobTag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Job::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(Job::paginate());
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
        $data = $this->validate($request, Job::validationRules());

        $model = Job::create($data);
        $id = $model->id;

        //das sieht aus, als hätte es ein Praktikant geschrieben
        foreach ($request->get('job_tags') as $jobTag){
            JobJobTag::create([ "job_id" => $id,
                "job_tag_id" => $jobTag,
            ]);
        }

        return response($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  Job  $job
     * @return Response
     */
    public function show(Job  $job)
    {
        //$this->authorize('view', $job);

        return response($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Job $job
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Job  $job)
    {
        $data = $this->validate($request, Job::validationRules());

        $status = $job->update($data);

        return response(['success' => $status]);
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
        return response(['success' => $job->delete()]);
    }

    /**
     * Get a "Category" given a specific "Job"
     *
     * @param Job $job
     * @return Response
     */
    public function getCategory(Job $job)
    {
        return response($job->category()->first());
    }

    /**
     * Get a "Company" given a specific "Job"
     *
     * @param Job $job
     * @return Response
     */
    public function getCompany(Job $job)
    {
        return response($job->company()->first());
    }

    /**
     * Get the "User" (the creator) for a specific "Job"
     *
     * @param Job $job
     * @return Response
     */
    public function getUser(Job $job)
    {
        return response($job->user()->first());
    }

    /**
     * Get all "JobTag" for a specific "Job"
     *
     * @param Job $job
     * @return Response
     */
    public function getTags(Job $job)
    {
        return response($job->jobTags()->paginate());
    }
}
