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
     * @return Response
     */
    public function index()
    {
        return UserController::indexP(25);
    }

    /**
     * Display a listing of the resource using paginate().
     *
     * @param int $itemsPerPage
     * @return Response
     */
    public function indexP(int $itemsPerPage)
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
}
