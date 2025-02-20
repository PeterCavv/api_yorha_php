<?php

namespace App\Http\Requests\Androids;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndroidRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'status_id' => 'required|integer|exists:statuses,id',
            'type_id' => 'required|integer|exists:types,id',
            'model_id' => 'required|integer|exists:models,id',
            'appearance_id' => 'required|integer|exists:appearances,id',
            'description' => 'nullable|string|max:500',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
