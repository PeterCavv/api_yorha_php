<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Appearance;

class AppearanceController extends Controller
{
    public function __invoke()
    {
        return response()->json(Appearance::all());
    }
}
