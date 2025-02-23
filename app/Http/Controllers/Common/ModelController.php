<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Models;

class ModelController extends Controller
{
    public function __invoke()
    {
        return response()->json(Models::all());
    }
}
