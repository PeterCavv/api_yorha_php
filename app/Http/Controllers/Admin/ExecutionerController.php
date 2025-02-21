<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Executioners\UpdateExecutionerRequest;
use App\Models\Executioner;
use Illuminate\Support\Arr;

class ExecutionerController extends Controller
{
    public function index()
    {
        $executioners = Executioner::with([
                'android:id,name',
                'equipment:id,name',
            ])->paginate(10);

        return response()->json($executioners);
    }

    public function update(UpdateExecutionerRequest $request, $id){
        $executionerData = $request->validated();

        $executioner = Executioner::findOrFail($id);

        $executionerData = Arr::only($executionerData, ['equipment_id']);

        $executioner->update($executionerData);

        return response()->json($executioner);
    }
}
