<?php

namespace App\Http\Requests\AssignedAndroids;

use Illuminate\Foundation\Http\FormRequest;

class AssignedAndroidsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'operator_id' => 'required|integer|exists:operators,id',
            'android_id' => 'required|integer|exists:androids,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
