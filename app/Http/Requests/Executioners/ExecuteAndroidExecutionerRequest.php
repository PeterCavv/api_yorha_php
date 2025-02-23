<?php

namespace App\Http\Requests\Executioners;

use Illuminate\Foundation\Http\FormRequest;

class ExecuteAndroidExecutionerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'executioner_ids' => 'required|array',
            'executioner_ids.*' => 'integer|exists:executioners,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
