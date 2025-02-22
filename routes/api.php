<?php

use App\Http\Controllers\Admin\AndroidController as AdminAndroidController;
use App\Http\Controllers\Common\AndroidController as CommonAndroidController;
use App\Http\Controllers\Admin\ExecutionerController as AdminExecutionerController;
use App\Http\Controllers\Common\ReportController as CommonReportController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

use Illuminate\Support\Facades\Route;

/*Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('admin')->group(function () {
    Route::apiResource('androids', AdminAndroidController::class);
    Route::apiResource('executioners', AdminExecutionerController::class);
    Route::apiResource('reports', AdminReportController::class);
});

Route::prefix('common')->group(function () {
    Route::apiResource('androids', CommonAndroidController::class);
    Route::apiResource('reports', CommonReportController::class);
});
