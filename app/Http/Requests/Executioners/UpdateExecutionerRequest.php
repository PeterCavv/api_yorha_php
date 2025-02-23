<?php

namespace App\Http\Requests\Executioners;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExecutionerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'equipment_id' => 'required|integer|exists:armory,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
