<?php

use App\Http\Controllers\Admin\AndroidController as AdminAndroidController;
use App\Http\Controllers\Admin\AssignedAndroidsController;
use App\Http\Controllers\Admin\ExecutionerController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Common\AndroidController as CommonAndroidController;
use App\Http\Controllers\Common\AppearanceController;
use App\Http\Controllers\Common\ArmoryController;
use App\Http\Controllers\Common\ModelController;
use App\Http\Controllers\Common\ReportController;
use App\Http\Controllers\Common\StatusController;
use App\Http\Controllers\Common\TypeController;
use Illuminate\Support\Facades\Route;

/*Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'user']);

    Route::middleware('role:admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::apiResource('androids', AdminAndroidController::class);
            Route::apiResource('executioners', ExecutionerController::class);
            Route::apiResource('operators', OperatorController::class);
            Route::apiResource('assigned-androids', AssignedAndroidsController::class);
            Route::apiResource('history', HistoryController::class);
        });
    });

    Route::prefix('common')->group(function () {
        Route::apiResource('androids', CommonAndroidController::class);
        Route::apiResource('reports', ReportController::class);

        Route::get('types', TypeController::class);
        Route::get('statuses', StatusController::class);
        Route::get('appearances', AppearanceController::class);
        Route::get('models', ModelController::class);
        Route::get('armory', ArmoryController::class);
    });
});


