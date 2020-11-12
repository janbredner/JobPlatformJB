<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        //TODO: zum testen der view herausgenommen
        //$this->authorizeResource(Car::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response(Car::paginate());
        //TODO: zum testen der view herausgenommen
        return response(Car::all());
        return response(CarResource::collection(Car::all()));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$this->validate($request, [
            'title' => 'string|max:190',
            'options.*' => 'string'
        ]);

        $car = Car::create($data);

        return response($car);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return response($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $data =$this->validate($request, [
            'title' => 'string|max:190',
            'options.*' => 'string'
        ]);

        $status = $car->update($data);

        return response(['success' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $status = $car->delete();

        return response(['success' => $status]);
    }
}
