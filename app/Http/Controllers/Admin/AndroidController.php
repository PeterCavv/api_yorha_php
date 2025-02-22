<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Androids\StoreAndroidRequest;
use App\Http\Requests\Androids\UpdateAndroidRequest;
use App\Http\Resources\Androids\AndroidCollection;
use App\Http\Resources\Androids\AndroidResource;
use App\Models\Android;
use Illuminate\Support\Arr;

class AndroidController extends Controller
{
    /**
     * Get all the androids, even those who are out of service.
     * @return AndroidCollection
     */
    public function index(){
        $androids = Android::withTrashed()->paginate(5);

        return new AndroidCollection($androids);
    }

    /**
     * Create and save a new Android into DB.
     * @param StoreAndroidRequest $request
     * @return AndroidResource
     */
    public function store(StoreAndroidRequest $request) {
        $androidData = $request->validated();

        $android = Android::create($androidData);

        return new AndroidResource($android);
    }

    /**
     * Update data
     * @param UpdateAndroidRequest $request
     * @param $id
     * @return AndroidResource
     */
    public function update(UpdateAndroidRequest $request, $id) {
        $androidData = $request->validated();

        $android = Android::findOrFail((int)$id);

        $updatedData = Arr::only($androidData, ['appearance_id', 'description']);

        $android->update($updatedData);

        return new AndroidResource($android);
    }

    public function destroy($id) {
        $android = Android::findOrFail($id);
        $android->delete();

        return response()->json('Android deleted successfully', 204);
    }
}
