<?php

namespace App\Http\Requests\Androids;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAndroidRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'appearance_id' => 'nullable|int|exists:appearances,id',
            'description' => 'nullable|string|max:500',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
