<?php

namespace App\Http\Resources\Androids;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AndroidResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return $this->detailedFormat();
    }

    public function basicFormat(){
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

    public function detailedFormat(){
        return [
            'name' => $this->name,
            'resume_name' => $this->resume_name,
            'model' => [
                'id' => $this->model_id,
                'name' => $this->model ? $this
                    ->model->name : null
            ],
            'type' => [
                'id' => $this->type_id,
                'name' => $this->type ? $this->type->name : null,
            ],
            'type_number' => $this->type_number,
            'appearance' => [
                'id' => $this->appearance_id,
                'name' => $this->appearance ? $this->appearance->name : null
            ],
            'status' => [
                'id' => $this->status_id,
                'name' => $this->status ? $this->status->name : null
            ]
        ];
    }

}
