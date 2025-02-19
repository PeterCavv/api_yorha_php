<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndroidRequest;
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

    public function store(StoreAndroidRequest $request) {
        $androidData = $request->validated();

        $android = Android::create($androidData);

        return response()->json($android, 201);
    }
}
