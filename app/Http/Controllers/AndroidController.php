<?php

namespace App\Http\Controllers;

use App\Models\Android;
use App\Models\Status;
use App\Models\Types;
use Request;

class AndroidController extends Controller
{
    public function index()
    {
        return response()->json(Android::all());
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'nullable|string',
            'status_id' => 'required|integer',
            'type_id' => 'required|integer',
            'model_id' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        $android = new Android();

        $android->status_id = Status::findOrFail($request->status_id)->id;
        $android->model_id = Status::findOrFail($request->model_id)->id;
        $android->description = $request->description;

        $android = $this->createName($request, $android);

        $android->type_id = Types::findOrFail($request->type_id)->id;
        $android->save();
    }


    //Methods

    /**
     * Creates a name for the Android.
     * @param Request $request
     * @return string
     */
    private function createName(Request $request, Android $android)
    {
        if(blank($request->name) && $request->name != 'Special') {
            $typeName = $this->validateType($request->type_id);

            $charType = substr($typeName, 0, 1);

            $typeNumber = Android::where('type_id', $request->type_id)->count();

            $android->name =  "YoRHa No. " . ($typeNumber + 1) . " Type " . $charType;
            $android->resume_name = $typeNumber . $charType;
            $android->type_number = $typeNumber;

            return $android;
        }

        return $request->name;
    }

    /**
     * Check if the Type's ID exists or not at the DB.
     * @param $type_id
     * @return \Illuminate\Support\HigherOrderCollectionProxy|mixed|string
     */
    private function validateType($type_id)
    {
        $type = Types::findOrFail($type_id)->id;
        return $type->name;
    }

}
