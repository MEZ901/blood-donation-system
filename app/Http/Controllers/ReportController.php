<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\Resources\report\ReportResource;
use App\Http\Resources\report\ReportCollection;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $reports = Report::all();
        return response()->json([
            'status' => 'success',
            'data' => new ReportCollection($reports),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request): JsonResponse
    {
        $report = Report::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => new ReportResource($report),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new ReportResource($report),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report): JsonResponse
    {
        $report->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => new ReportResource($report),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report): JsonResponse
    {
        $report->delete();
        return response()->json([
            'status' => 'success',
            'data' => 'Report deleted successfully',
        ]);
    }
}
