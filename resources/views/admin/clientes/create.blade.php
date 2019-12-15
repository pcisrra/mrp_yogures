@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cliente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clientes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nit">{{ trans('cruds.cliente.fields.nit') }}</label>
                <input class="form-control {{ $errors->has('nit') ? 'is-invalid' : '' }}" type="text" name="nit" id="nit" value="{{ old('nit', '') }}" required>
                @if($errors->has('nit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_empresa">{{ trans('cruds.cliente.fields.nombre_empresa') }}</label>
                <input class="form-control {{ $errors->has('nombre_empresa') ? 'is-invalid' : '' }}" type="text" name="nombre_empresa" id="nombre_empresa" value="{{ old('nombre_empresa', '') }}" required>
                @if($errors->has('nombre_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nombre_empresa_helper') }}</span>
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