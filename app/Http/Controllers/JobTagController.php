<?php

namespace App\Http\Controllers;

use App\Models\JobTag;
use Illuminate\Http\Request;

class JobTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobTag::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTag  $jobTag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return JobTag::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobTag  $jobTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobTag $jobTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTag  $jobTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTag $jobTag)
    {
        //
    }
}
