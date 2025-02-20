<?php

use App\Http\Controllers\Admin\AndroidController;
use Illuminate\Support\Facades\Route;

/*Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('androids', AndroidController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
})->name('test');
