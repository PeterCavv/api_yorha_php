<?php

namespace App\Http\Resources\AssignedAndroids;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class AssignedAndroidsCollection extends ResourceCollection
{
    public function toArray(Request $request): Collection
    {
        return $this->collection;
    }
}
