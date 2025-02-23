<?php

namespace App\Http\Resources\Operators;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OperatorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'android' => [
                'id' => $this->android_id,
                'name' => $this->android ? $this->android->name : null,
            ]
        ];
    }
}
