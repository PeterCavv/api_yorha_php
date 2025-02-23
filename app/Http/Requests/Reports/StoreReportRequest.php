<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:500',
            'published_at' => 'required|date|date_format:d-m-Y|after_or_equal:today',
            'android_id' => 'required|integer|exists:androids,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
