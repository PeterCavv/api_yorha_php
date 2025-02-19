<?php

namespace App\Http\Requests;

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
            'description' => 'nullable|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
