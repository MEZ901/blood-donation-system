<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StatsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth:api', 'role:admin']);
    }

    public function usersCount(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => User::count(),
        ]);
    }

    public function appointmentsCount(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Appointment::count(),
        ]);
    }

    public function appointmentsPerMonth(): JsonResponse
    {
        $appointments = Appointment::selectRaw('count(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->get();
        return response()->json([
            'status' => 'success',
            'data' => $appointments,
        ]);
    }
}
