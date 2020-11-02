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
     * @return Response
     */
    public function index()
    {
        return JobController::indexP(25);
    }

    /**
     * Display a listing of the resource using paginate().
     *
     * @param int $itemsPerPage
     * @return Response
     */
    public function indexP(int $itemsPerPage)
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
}
