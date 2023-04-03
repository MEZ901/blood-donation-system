<?php

namespace App\Http\Controllers;

use App\Models\BloodDrive;
use App\Http\Requests\StoreBloodDriveRequest;
use App\Http\Requests\UpdateBloodDriveRequest;

class BloodDriveController extends Controller
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
     * @param  \App\Http\Requests\StoreBloodDriveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodDriveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodDrive  $bloodDrive
     * @return \Illuminate\Http\Response
     */
    public function show(BloodDrive $bloodDrive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodDrive  $bloodDrive
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodDrive $bloodDrive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBloodDriveRequest  $request
     * @param  \App\Models\BloodDrive  $bloodDrive
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodDriveRequest $request, BloodDrive $bloodDrive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodDrive  $bloodDrive
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDrive $bloodDrive)
    {
        //
    }
}
