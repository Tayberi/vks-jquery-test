<?php

namespace App\Http\Requests;

use App\Models\Studio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('studio_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:studios,name,' . request()->route('studio')->id,
            ],
        ];
    }
}
