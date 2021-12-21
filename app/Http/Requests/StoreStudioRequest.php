<?php

namespace App\Http\Requests;

use App\Models\Studio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('studio_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:studios',
            ],
        ];
    }
}
