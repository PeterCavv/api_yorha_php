<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Androids\StoreAndroidRequest;
use App\Http\Requests\Androids\UpdateAndroidRequest;
use App\Models\Android;
use Illuminate\Support\Arr;

class AndroidController extends Controller
{
    public function store(StoreAndroidRequest $request) {
        $androidData = $request->validated();

        $android = Android::create($androidData);

        return response()->json($android, 201);
    }

    public function update(UpdateAndroidRequest $request, $id) {
        $androidData = $request->validated();

        $android = Android::where('id', '=', $id);

        $updatedData = Arr::only($androidData, ['status_id', 'description']);

        $android->update($updatedData);

        return response()->json($android, 200);
    }

    public function destroy($id) {
        $android = Android::findOrFail($id);
        $android->delete();

        return response()->json('Android deleted successfully', 204);
    }
}
