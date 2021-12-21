<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:events,name,' . request()->route('event')->id,
            ],
            'date_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'time_start' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'time_end' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'studios.*' => [
                'integer',
            ],
            'studios' => [
                'array',
            ],
        ];
    }
}
