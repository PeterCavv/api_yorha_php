<?php

use App\Http\Controllers\Admin\AndroidController as AdminAndroidController;
use App\Http\Controllers\Common\AndroidController as CommonAndroidController;

use Illuminate\Support\Facades\Route;

/*Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('admin')->group(function () {
    Route::apiResource('androids', AdminAndroidController::class);
});

Route::prefix('common')->group(function () {
    Route::apiResource('androids', CommonAndroidController::class);
});

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
})->name('test');
