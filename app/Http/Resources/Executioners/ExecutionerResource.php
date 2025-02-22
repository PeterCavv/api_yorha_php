<?php

namespace App\Http\Resources\Executioners;

use App\Models\Armory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExecutionerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'android' => [
                'id' => $this->android_id,
                'name' => $this->android ? $this->android->name : null,
            ],
            'equipment' => [
                'id' => $this->equipment_id,
                'name' => $this->equipment ? $this->equipment->name : null,
                'weapon_type' => $this->equipment->weapon_type ?
                    $this->equipment->weapon_type->name : null,
            ]
        ];
    }
}
