<?php

namespace App\Http\Requests\Histories;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'executioner_ids' => 'required|array|min:1',
            'executioner_ids.*' => 'integer|exists:executioners,id',
            'android_id' => 'required|integer|exists:androids,id',
            'summary' => 'required|string|max:255'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
