<?php

namespace App\Observers;

use App\Models\Report;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class ReportObserver
{
    public function saving(Report $report){
        $updateDate = Carbon::createFromFormat(
            'd-m-Y', $report->published_at)->format('Y-m-d H:i:s'
        );

        $report->published_at = $updateDate;
    }

    public function deleting(Report $report){
        $today = Carbon::today()->setTime(0, 0,0)->format('Y-m-d');
        $path = request()->path();
        $reportDate = Carbon::parse($report->published_at)->setTime(0, 0,0);

        if($reportDate->greaterThan($today)){
            $report->forceDelete();
        } else if($reportDate->lessThanOrEqualTo($today) && $path !== 'api/admin/reports/'.$report->id){
            throw ValidationException::withMessages([
                'name' => 'You cannot delete this Report'
            ]);
        }
    }
}
