<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Http\Resources\hospital\HospitalResource;
use App\Http\Resources\hospital\HospitalCollection;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $hospitals = Hospital::all();
        return response()->json([
            'status' => 'success',
            'data' => new HospitalCollection($hospitals),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHospitalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHospitalRequest $request): JsonResponse
    {
        $hospital = Hospital::create($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => new HospitalResource($hospital),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new HospitalResource($hospital),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHospitalRequest  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHospitalRequest $request, Hospital $hospital): JsonResponse
    {
        $hospital->update($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => new HospitalResource($hospital),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
}
