<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndroidRequest;
use App\Models\Android;

class AndroidController extends Controller
{
    public function store(StoreAndroidRequest $request) {
        $androidData = $request->validated();

        $android = Android::create($androidData);

        return response()->json($android, 201);
    }

    public function destroy($id) {
        $android = Android::findOrFail($id);
        $android->delete();

        return response()->json('Android deleted successfully', 204);
    }
}
