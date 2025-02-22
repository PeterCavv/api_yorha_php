<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reports\StoreReportRequest;
use App\Http\Requests\Reports\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class ReportController extends Controller
{
    /**
     * Return all the reports.
     * @return JsonResponse
     */
    public function index()
    {
        $reports = Report::with([
            'android:id,name'
        ])->paginate(10);
        return response()->json($reports);
    }

    /**
     * Search a Report based on its ID.
     * @param $id
     * @return JsonResponse
     */
    public function show($id){
        return response()->json(Report::findOrFail($id));
    }

    /**
     * Create a Report into DB.
     * @param StoreReportRequest $request
     * @return JsonResponse
     */
    public function store(StoreReportRequest $request){
        $reportData = $request->validated();

        $report = Report::create($reportData);

        return response()->json($report, 201);
    }

    /**
     * Update a Report. The Report needs to have the original writer of it,
     * thus the Android's ID cannot be changed.
     * @param UpdateReportRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateReportRequest $request, $id)
    {
        $reportData  = $request->validated();

        $report = Report::findOrFail($id);

        $updateData = Arr::only($reportData, ['title', 'body', 'published_at']);

        $report->update($updateData);

        return response()->json($report, 200);
    }

    /**
     * Soft delete the Report.
     * @param $id
     * @return void
     */
    public function destroy($id){
        $report = Report::findOrFail($id);
        $report->delete();
    }

}
