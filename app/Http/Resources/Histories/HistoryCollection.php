<?php

namespace App\Http\Resources\Histories;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class HistoryCollection extends ResourceCollection
{
    public function toArray(Request $request): Collection
    {
        return $this->collection;
    }
}
