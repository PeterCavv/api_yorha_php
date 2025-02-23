<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Androids\StoreAndroidRequest;
use App\Http\Requests\Androids\UpdateAndroidRequest;
use App\Http\Requests\Executioners\ExecuteAndroidExecutionerRequest;
use App\Http\Resources\Androids\AndroidCollection;
use App\Http\Resources\Androids\AndroidResource;
use App\Http\Resources\Histories\HistoryResource;
use App\Models\Android;
use App\Models\Executioner;
use App\Models\History;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

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

    public function destroy(ExecuteAndroidExecutionerRequest $request, $id) {
        $validated = $request->validated();

        $android = Android::findOrFail($id);
        $executionerIds = $validated['executioner_ids'];

        $invalidExecutioners = Executioner::whereIn('id', $executionerIds)
            ->where('android_id', $android->id)
            ->exists();

        if($invalidExecutioners){
            throw ValidationException::withMessages([
                'executioner_id' => 'You cannot execute an Android with itself.'
            ]);
        }

        $history = History::create([
           'summary' => 'Android ' . $android->name . ' executed successfully.',
            'android_id' => $android->id,
        ]);

        $android->delete();

        $history->executioners()->attach($executionerIds);

        return new HistoryResource($history);
    }
}
