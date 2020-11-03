<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $itemsPerPage
     * @return Response
     */
    public function index(int $itemsPerPage = 15)
    {
        return response(User::paginate($itemsPerPage), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return response(User::create($request->all(), 201));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function show(User $user)
    {
        return response($user,200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if($user->delete())
        {
            return response(['success' => 'true'], 200);
        }
        else
        {
            return response(['success' => 'false'], 410);
        }
    }

    /**
     * Get a listing of "Job" created by a given "User".
     *
     * @param User $user
     * @param int $itemsPerPage
     * @return Response
     */
    public function getJobs(User $user, int $itemsPerPage = 15)
    {
        return response($user->getJobs()->paginate($itemsPerPage), 200);
    }

    /**
     * Get a listing of "Company" created by a given "User".
     *
     * @param User $user
     * @param int $itemsPerPage
     * @return Response
     */
    public function getCreatedCompanies(User $user, int $itemsPerPage = 15)
    {
        return response($user->getCreatedCompanies()->paginate($itemsPerPage), 200);
    }

    /**
     * Get a listing of "Company" related to a given "User" (not the creator).
     *
     * @param User $user
     * @param int $itemsPerPage
     * @return Response
     */
    public function getCompanies(User $user, int $itemsPerPage = 15)
    {
        return response($user->getCompanies()->paginate($itemsPerPage), 200);
    }
}
