<?php

namespace App\Http\Controllers;

use App\Models\BloodDrive;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreBloodDriveRequest;
use App\Http\Requests\UpdateBloodDriveRequest;
use App\Http\Resources\bloodDrive\BloodDriveResource;
use App\Http\Resources\bloodDrive\BloodDriveCollection;

class BloodDriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $bloodDerives = BloodDrive::all();
        return response()->json([
            'status' => 'success',
            'data' => new BloodDriveCollection($bloodDerives),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBloodDriveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodDriveRequest $request): JsonResponse
    {
        $bloodDrive = BloodDrive::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => new BloodDriveResource($bloodDrive),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodDrive  $bloodDrive
     * @return \Illuminate\Http\Response
     */
    public function show(BloodDrive $bloodDrive): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new BloodDriveResource($bloodDrive),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBloodDriveRequest  $request
     * @param  \App\Models\BloodDrive  $bloodDrive
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodDriveRequest $request, BloodDrive $bloodDrive): JsonResponse
    {
        $bloodDrive->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => new BloodDriveResource($bloodDrive),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodDrive  $bloodDrive
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDrive $bloodDrive): JsonResponse
    {
        $bloodDrive->delete();
        return response()->json([
            'status' => 'success',
            'data' => 'Blood drive deleted successfully',
        ]);
    }
}
