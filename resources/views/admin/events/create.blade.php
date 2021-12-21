@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.event.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_start">{{ trans('cruds.event.fields.date_start') }}</label>
                <input class="form-control date {{ $errors->has('date_start') ? 'is-invalid' : '' }}" type="text" name="date_start" id="date_start" value="{{ old('date_start') }}" required>
                @if($errors->has('date_start'))
                    <span class="text-danger">{{ $errors->first('date_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.date_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time_start">{{ trans('cruds.event.fields.time_start') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_start') ? 'is-invalid' : '' }}" type="text" name="time_start" id="time_start" value="{{ old('time_start') }}" required>
                @if($errors->has('time_start'))
                    <span class="text-danger">{{ $errors->first('time_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.time_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time_end">{{ trans('cruds.event.fields.time_end') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_end') ? 'is-invalid' : '' }}" type="text" name="time_end" id="time_end" value="{{ old('time_end') }}" required>
                @if($errors->has('time_end'))
                    <span class="text-danger">{{ $errors->first('time_end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.time_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="studios">{{ trans('cruds.event.fields.studio') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('studios') ? 'is-invalid' : '' }}" name="studios[]" id="studios" multiple>
                    @foreach($studios as $id => $studio)
                        <option value="{{ $id }}" {{ in_array($id, old('studios', [])) ? 'selected' : '' }}>{{ $studio }}</option>
                    @endforeach
                </select>
                @if($errors->has('studios'))
                    <span class="text-danger">{{ $errors->first('studios') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.studio_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection