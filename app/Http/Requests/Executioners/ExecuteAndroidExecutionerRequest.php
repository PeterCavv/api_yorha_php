<?php

namespace App\Http\Requests\Executioners;

use Illuminate\Foundation\Http\FormRequest;

class ExecuteAndroidExecutionerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'executioners_id' => 'required|array',
            'executioners_id.*' => 'integer|exists:executioners,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
