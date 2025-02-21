<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Android;

class AndroidController extends Controller
{
    /**
     * Get all the operational androids.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $androids = Android::with([
            'model:id,name',
            'type:id,name',
            'appearance:id,name',
            'status:id,name',
        ])->paginate(10);

        return response()->json($androids);
    }

    /**
     * Get an Android searched by its ID.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $android = Android::with(['id', '=', $id])->first();

        return response()->json($android);
    }
}
