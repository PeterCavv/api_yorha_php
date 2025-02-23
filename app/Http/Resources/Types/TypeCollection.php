<?php

namespace App\Http\Resources\Types;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class TypeCollection extends ResourceCollection
{
    public function toArray(Request $request): Collection
    {
        return $this->collection;
    }
}
