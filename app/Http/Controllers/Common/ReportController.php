<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reports\StoreReportRequest;
use App\Http\Requests\Reports\UpdateReportRequest;
use App\Http\Resources\Reports\ReportCollection;
use App\Http\Resources\Reports\ReportResource;
use App\Models\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class ReportController extends Controller
{
    /**
     * Return all the reports.
     * @return ReportCollection
     */
    public function index()
    {
        $reports = Report::paginate(10);

        return new ReportCollection($reports);
    }

    /**
     * Search a Report based on its ID.
     * @param $id
     * @return ReportResource
     */
    public function show($id){
        return new ReportResource(Report::findOrFail($id));
    }

    /**
     * Create a Report into DB.
     * @param StoreReportRequest $request
     * @return ReportResource
     */
    public function store(StoreReportRequest $request){
        $reportData = $request->validated();

        $userId = ['user_id' => auth()->user()->id];
        $reportData = array_merge($reportData, $userId);

        $report = Report::create($reportData);

        return new ReportResource($report);
    }

    /**
     * Update a Report. The Report needs to have the original writer of it,
     * thus the Android's ID cannot be changed.
     * @param UpdateReportRequest $request
     * @param $id
     * @return ReportResource
     */
    public function update(UpdateReportRequest $request, $id)
    {
        $reportData  = $request->validated();

        $report = Report::findOrFail($id);

        $updateData = Arr::only($reportData, ['title', 'body', 'published_at']);

        $report->update($updateData);

        return new ReportResource($report);
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
