<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Androids\StoreAndroidRequest;
use App\Http\Requests\Androids\UpdateAndroidRequest;
use App\Models\Android;
use Illuminate\Support\Arr;

class AndroidController extends Controller
{
    /**
     * Get all the androids, even those who are out of service.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $androids = Android::withTrashed()->with([
            'model:id,name',
            'type:id,name',
            'appearance:id,name',
            'status:id,name',
        ])->paginate(10);

        return response()->json($androids);
    }

    /**
     * Create and save a new Android into DB.
     * @param StoreAndroidRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAndroidRequest $request) {
        $androidData = $request->validated();

        $android = Android::create($androidData);

        return response()->json($android, 201);
    }

    /**
     * Update data
     * @param UpdateAndroidRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAndroidRequest $request, $id) {
        $androidData = $request->validated();

        $android = Android::findOrFail((int)$id);

        $updatedData = Arr::only($androidData, ['appearance_id', 'description']);

        $android->update($updatedData);

        return response()->json($android, 200);
    }

    public function destroy($id) {
        $android = Android::findOrFail($id);
        $android->delete();

        return response()->json('Android deleted successfully', 204);
    }
}
