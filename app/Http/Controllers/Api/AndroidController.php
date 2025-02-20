<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Android;

class AndroidController extends Controller
{
    public function index()
    {
        return response()->json(Android::all());
    }
}
