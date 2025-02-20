<?php

namespace App\Http\Requests\Androids;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAndroidRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status_id' => 'required|integer|exists:statuses,id',
            'description' => 'nullable|string|max:500',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
