<?php

namespace App\Http\Requests;

class CModelRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'brand_id' => ['required', 'exists:brands'],
        ];
    }
}
