<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignedAndroidsRequest;
use App\Http\Resources\AssignedAndroids\AssignedAndroidsCollection;
use App\Http\Resources\AssignedAndroids\AssignedAndroidsResource;
use App\Models\AssignedAndroids;

class AssignedAndroidsController extends Controller
{
    /**
     * Get all the assignations.
     * @return AssignedAndroidsCollection
     */
    public function index()
    {
        $assignations = AssignedAndroids::paginate(10);

        return new AssignedAndroidsCollection($assignations);
    }

    /**
     * Get one assignation by its ID.
     * @param $id
     * @return AssignedAndroidsResource
     */
    public function show($id){
        $assignedAndroid = AssignedAndroids::findOrFail($id);

        return new AssignedAndroidsResource($assignedAndroid);
    }

    /**
     * Assign an Android to an Operator.
     * @param AssignedAndroidsRequest $request
     * @return AssignedAndroidsResource
     */
    public function store(AssignedAndroidsRequest $request){
        $assignedData = $request->validated();

        $assignedAndroid = AssignedAndroids::create($assignedData);

        return new AssignedAndroidsResource($assignedAndroid);
    }

    public function destroy($id){
        $assignedAndroids = AssignedAndroids::findOrFail($id);
        $assignedAndroids->delete();

        return response()->json('Assignment ended.', 204);
    }
}
