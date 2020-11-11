<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Company::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(Company::paginate());
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
        $data = $this->validate($request, Company::validationRules());

        //eventuell in boot aufnehmen
        $data = $data + ['user_id' => Auth::id()];

        return response(Company::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return Response
     */
    public function show(Company $company)
    {
        return response($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Company $company)
    {
        $data = $this->validate($request, Company::validationRules());

        $status = $company->update($data);

        return response(['success' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     * @throws Exception
     */
    public function destroy(Company $company)
    {
        return response(['success' => $company->delete()]);
    }

    /**
     * Get a listing of jobs given a category.
     *
     * @param Company $company
     * @return Response
     */
    //so wie beim validieren
    public function getJobs(Company $company)
    {
        return response($company->getJobs()->paginate());
    }

    /**
     * Get the "User" (the creator) for a specific "Company"
     *
     * @param Company $company
     * @return Response
     */
    public function getCreator(Company $company)
    {
        return response($company->creator()->first());
    }

    /**
     * Get a listing of "User" (not the creator) related to a given "Company".
     *
     * @param Company $company
     * @return Response
     */
    public function getUsers(Company $company)
    {
        return response($company->getUsers()->paginate());
    }
}
