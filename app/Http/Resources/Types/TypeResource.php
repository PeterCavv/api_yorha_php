<?php

namespace App\Http\Resources\Types;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'resume' => $this->resume,
            'desc' => $this->desc
        ];
    }
}
