<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Android;

class AndroidController extends Controller
{
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

    public function show($id){
        $android = Android::with(['id', '=', $id])->first();

        return response()->json($android);
    }
}
