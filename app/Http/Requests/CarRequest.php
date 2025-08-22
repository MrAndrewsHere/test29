<?php

namespace App\Http\Requests;

class CarRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'mileage' => ['nullable', 'integer'],
            'year' => ['nullable', 'integer'],
            'color' => ['nullable'],
            'c_model_id' => ['required', 'exists:c_models,id'],
        ];
    }
}
