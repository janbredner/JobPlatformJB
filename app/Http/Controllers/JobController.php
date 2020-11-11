<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobJobTag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->filter($request);
        //return response(Job::paginate());
    }

    /*
     * Filter a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    private function filter(Request $request)
    {
        /*
         * Das geht bestimmt auch schöner?
         * Auslagern in extra Klasse - aber wohin - extra App\Filter anlegen?
         */
        $jobs = Job::query();

        $filter = $request->validate([
           'user_id'        => 'int|exists:users,id',
           'company_id'     => 'int|exists:companies,id',
           'category_id'    => 'int|exists:job_categories,id',
        ]);

        if (array_key_exists('user_id', $filter)) {
            $jobs->where('user_id', '=', $filter['user_id']);
        }

        if (array_key_exists('company_id', $filter)) {
            $jobs->where('company_id', '=', $filter['company_id']);
        }

        if (array_key_exists('category_id', $filter)) {
            $jobs->where('job_category_id', '=', $filter['category_id']);
        }

        return response($jobs->paginate());
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

        //boot creating event
        //$data = $data + ['user_id' => Auth::id()];
        //ist ausgelagert und funktioniert

        $job = Job::create($data);

        if(array_key_exists('job_tags', $data))
        {
            $tags = array();

            foreach ($data['job_tags'] as $jobTag){
                array_push($tags, $jobTag);
            }

            //sync eingebaut
            $job->jobTags()->sync($tags);
        }

        return response($job);
    }

    /**
     * Display the specified resource.
     *
     * @param  Job  $job
     * @return Response
     */
    public function show(Job  $job)
    {
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
