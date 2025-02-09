<?php

namespace App\Http\Controllers\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'service' => 'required|string',
            'rating' => 'required|int',
            'datetime' => 'required|int'
        ];
    }
}
