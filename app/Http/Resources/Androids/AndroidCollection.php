<?php

namespace App\Http\Resources\Androids;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class AndroidCollection extends ResourceCollection
{
    public function toArray(Request $request): Collection
    {
        return $this->collection;
    }
}
