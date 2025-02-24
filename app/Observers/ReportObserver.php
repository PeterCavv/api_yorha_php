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
        $reportDate = Carbon::parse($report->published_at)->setTime(0, 0,0);

        if($reportDate->lessThanOrEqualTo($today) && auth()->user()->role !== 'admin'){
            throw ValidationException::withMessages([
                'name' => 'You cannot delete this Report'
            ]);
        }
    }

    public function deleted(Report $report)
    {
        $today = Carbon::today()->setTime(0, 0,0)->format('Y-m-d');
        $reportDate = Carbon::parse($report->published_at)->setTime(0, 0,0);
        
        if($reportDate->greaterThan($today) && auth()->user()->id === $report->user_id){
            $report->forceDelete();
        }
    }
}
