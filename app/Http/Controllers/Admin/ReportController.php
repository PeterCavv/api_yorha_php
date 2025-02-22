<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
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
