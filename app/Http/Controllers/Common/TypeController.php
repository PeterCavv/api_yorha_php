<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Resources\Types\TypeCollection;
use App\Models\Types;

class TypeController extends Controller
{
    public function __invoke()
    {
        $types = Types::all();

        return new TypeCollection($types);
    }
}
