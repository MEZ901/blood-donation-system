<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\appointment\AppointmentResource;
use App\Http\Resources\appointment\AppointmentCollection;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): AppointmentCollection
    {
        if ($request->has('user_id')) {
            $appointments = Appointment::where('user_id', $request->user_id)->get();
            return new AppointmentCollection($appointments);
        }
        $appointments = Appointment::all();
        return new AppointmentCollection($appointments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request): \Illuminate\Http\JsonResponse
    {
        $appointmentCount = Appointment::where('date', $request->date)->count();
        if ($appointmentCount >= 5) {
            return response()->json([
                'message' => 'There are already 5 appointments for this date',
            ], 400);
        }
        $userAppointments = Appointment::where('user_id', $request->user_id)->where('status', 'pending')->count();
        if ($userAppointments >= 1) {
            return response()->json([
                'message' => 'You already have a pending appointment',
            ], 400);
        }
        $appointment = Appointment::create($request->validated());
        return response()->json([
            'message' => 'Appointment created successfully',
            'data' => new AppointmentResource($appointment),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment): \Illuminate\Http\JsonResponse
    {
        $appointment = Appointment::findOrFail($appointment->id);
        return response()->json([
            'data' => new AppointmentResource($appointment),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment): \Illuminate\Http\JsonResponse
    {
        $appointmentCount = Appointment::where('date', $request->date)->count();
        if ($appointmentCount >= 5) {
            return response()->json([
                'message' => 'There are already 5 appointments for this date',
            ], 400);
        }
        $appointment->update($request->validated());
        return response()->json([
            'message' => 'Appointment updated successfully',
            'data' => new AppointmentResource($appointment),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment) : \Illuminate\Http\JsonResponse
    {
        $appointment->delete();
        return response()->json([
            'message' => 'Appointment deleted successfully',
        ], 200);
    }
}
