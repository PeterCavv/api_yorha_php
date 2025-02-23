<?php

namespace App\Http\Resources\Armory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ArmoryCollection extends ResourceCollection
{
    public function toArray(Request $request): Collection
    {
        return  $this->collection;
    }
}
