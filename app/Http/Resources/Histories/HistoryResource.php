<?php

namespace App\Http\Resources\Histories;

use App\Http\Resources\Androids\AndroidResource;
use App\Http\Resources\Executioners\ExecutionerCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'executors' => ExecutionerCollection::collection($this->executioners),
            'android_executed' => (new AndroidResource($this->android))->basicFormat(),
            'execution_date' => $this->execution_date,
            'summary' => $this->summary
        ];
    }
}
