<?php

namespace App\Http\Resources\Histories;

use App\Http\Resources\Androids\AndroidResource;
use App\Http\Resources\Executioners\ExecutionerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'executioners' => ExecutionerResource::collection($this->executioner),
            'android' => (new AndroidResource($this->android))->basicFormat(),
            'summary' => $this->summary ?? null,
            'executed_at' => $this->created_at,
        ];
    }
}
