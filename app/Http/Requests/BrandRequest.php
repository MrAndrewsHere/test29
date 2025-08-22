<?php

namespace App\Http\Requests;

class BrandRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
        ];
    }
}
