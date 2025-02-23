<?php

namespace App\Http\Resources\Executioners;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ExecutionerCollection extends ResourceCollection
{
    public function toArray(Request $request): \Illuminate\Support\Collection
    {
        return $this->collection;
    }
}
