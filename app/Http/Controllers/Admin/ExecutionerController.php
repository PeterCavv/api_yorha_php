<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Executioners\ExecuteAndroidExecutionerRequest;
use App\Http\Requests\Executioners\UpdateExecutionerRequest;
use App\Http\Resources\Executioners\ExecutionerCollection;
use App\Http\Resources\Executioners\ExecutionerResource;
use App\Models\Android;
use App\Models\Executioner;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class ExecutionerController extends Controller
{
    /**
     * Get every Executioner
     * @return ExecutionerCollection
     */
    public function index()
    {
        $executioners = Executioner::paginate(10);

        return new ExecutionerCollection($executioners);
    }

    /**
     * Get one executioner by its ID.
     * @param $id
     * @return ExecutionerResource
     */
    public function show($id){
        $executioner = Executioner::findOrFail($id);

        return new ExecutionerResource($executioner);
    }

    /**
     * Update the equipment of an Executioner.
     * @param UpdateExecutionerRequest $request
     * @param $id
     * @return ExecutionerResource
     */
    public function update(UpdateExecutionerRequest $request, $id){
        $executionerData = $request->validated();

        $executioner = Executioner::findOrFail($id);

        $executionerData = Arr::only($executionerData, ['equipment_id']);

        $executioner->update($executionerData);

        return new ExecutionerResource($executioner);
    }

}
