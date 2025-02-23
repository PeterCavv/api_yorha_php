<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Status;

class StatusController extends Controller
{
    public function __invoke()
    {
        return response()->json(Status::all());
    }
}
