<?php

namespace App\Http\Resources\AssignedAndroids;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignedAndroidsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'operator' => [
                'id' => $this->operator_id,
                'name' => $this->operator ? $this
                    ->operator->android->name : null],
            'android_assigned' => [
                'id' => $this->id,
                'name' => $this->android ? $this->android->name : null,
            ]
        ];
    }
}
