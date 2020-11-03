<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $itemsPerPage
     * @return Response
     */
    public function index(int $itemsPerPage = 15)
    {
        return response(Company::paginate($itemsPerPage), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return response(Company::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return Response
     */
    public function show(Company $company)
    {
        return response($company, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());

        return response($company, 200);
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
        if($company->delete())
        {
            return response(['success' => 'true'], 200);
        }
        else
        {
            return response(['success' => 'false'], 410);
        }
    }
}
