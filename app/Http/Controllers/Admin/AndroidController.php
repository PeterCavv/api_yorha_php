<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndroidRequest;
use App\Models\Android;

class AndroidController extends Controller
{
    public function __construct(){
        return response()->json('Hola');
    }
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

    public function store(StoreAndroidRequest $request) {
        $androidData = $request->validated();

        $android = Android::create($androidData);

        return response()->json($android, 201);
    }
}
