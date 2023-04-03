<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Http\Requests\StoreBloodTypeRequest;
use App\Http\Requests\UpdateBloodTypeRequest;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBloodTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodType  $bloodType
     * @return \Illuminate\Http\Response
     */
    public function show(BloodType $bloodType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodType  $bloodType
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodType $bloodType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBloodTypeRequest  $request
     * @param  \App\Models\BloodType  $bloodType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodTypeRequest $request, BloodType $bloodType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodType  $bloodType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodType $bloodType)
    {
        //
    }
}
