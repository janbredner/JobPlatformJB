<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(User::paginate());
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
        $data = $this->validate($request, User::validationRules());

        return response(User::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function show(User $user)
    {
        return response($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, User $user)
    {
        $data = $this->validate($request, User::validationRules());

        $status = $user->update($data);

        return response(['success' => $status]);
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
        return response(['success' => $user->delete()]);
    }

    /**
     * Get a listing of "Job" created by a given "User".
     *
     * @param User $user
     * @return Response
     */
    public function getJobs(User $user)
    {
        return response($user->getJobs()->paginate());
    }

    /**
     * Get a listing of "Company" created by a given "User".
     *
     * @param User $user
     * @return Response
     */
    public function getCreatedCompanies(User $user)
    {
        return response($user->getCreatedCompanies()->paginate());
    }

    /**
     * Get a listing of "Company" related to a given "User" (not the creator).
     *
     * @param User $user
     * @return Response
     */
    public function getCompanies(User $user)
    {
        return response($user->getCompanies()->paginate());
    }
}
