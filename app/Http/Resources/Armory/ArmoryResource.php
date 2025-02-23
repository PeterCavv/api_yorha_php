<?php

namespace App\Http\Resources\Armory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArmoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'weapon_type' => [
                'id' => $this->weapon_type_id,
                'name' => $this->weaponType ? $this->weaponType->name : null
            ],
            'description' => $this->description
        ];
    }
}
