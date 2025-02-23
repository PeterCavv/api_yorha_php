<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Resources\Androids\AndroidCollection;
use App\Http\Resources\Androids\AndroidResource;
use App\Models\Android;

class AndroidController extends Controller
{
    /**
     * Get all the operational androids.
     * @return AndroidCollection
     */
    public function index()
    {
        $androids = Android::paginate(5);

        return new AndroidCollection($androids);
    }

    /**
     * Get an Android searched by its ID.
     * @param $id
     * @return AndroidResource
     */
    public function show($id){
        $android = Android::findOrFail($id);

        return new AndroidResource($android);
    }
}
