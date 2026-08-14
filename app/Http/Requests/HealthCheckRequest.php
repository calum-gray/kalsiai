<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HealthCheckRequest extends FormRequest
{
    protected const int QUESTION_TOTAL = 10;

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('answers') && is_string($this->answers)) {
            $this->merge([
                'answers' => json_decode($this->answers, true) ?? [],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'answers' => ['required', 'array', 'size:'.self::QUESTION_TOTAL],
            'answers.*' => ['required', 'string'],
        ];
    }
}
