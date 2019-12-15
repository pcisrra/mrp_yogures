@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.presentacione.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.presentaciones.update", [$presentacione->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="capacidad">{{ trans('cruds.presentacione.fields.capacidad') }}</label>
                <input class="form-control {{ $errors->has('capacidad') ? 'is-invalid' : '' }}" type="number" name="capacidad" id="capacidad" value="{{ old('capacidad', $presentacione->capacidad) }}" step="0.01" required>
                @if($errors->has('capacidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('capacidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.presentacione.fields.capacidad_helper') }}</span>
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