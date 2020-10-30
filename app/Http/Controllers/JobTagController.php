<?php

namespace App\Http\Controllers;

use App\Models\JobTag;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class JobTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return JobTag::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return JobTag::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id)
    {
        return JobTag::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $jobTag = JobTag::findOrFail($id);
        $jobTag->update($request->all());

        return $jobTag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $jobTag = JobTag::findOrfail($id);
        $jobTag->delete();

        return response(null, 204);
    }
}
