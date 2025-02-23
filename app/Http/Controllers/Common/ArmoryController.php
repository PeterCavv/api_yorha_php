<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Resources\Armory\ArmoryCollection;
use App\Models\Armory;

class ArmoryController extends Controller
{
    public function __invoke()
    {
        return new ArmoryCollection(Armory::all());
    }
}
