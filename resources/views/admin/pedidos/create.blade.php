@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pedido.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pedidos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="cliente_id">{{ trans('cruds.pedido.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id" required>
                    @foreach($clientes as $id => $cliente)
                        <option value="{{ $id }}" {{ old('cliente_id') == $id ? 'selected' : '' }}>{{ $cliente }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cliente_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pedido.fields.cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_produto_id">{{ trans('cruds.pedido.fields.nombre_produto') }}</label>
                <select class="form-control select2 {{ $errors->has('nombre_produto') ? 'is-invalid' : '' }}" name="nombre_produto_id" id="nombre_produto_id" required>
                    @foreach($nombre_produtos as $id => $nombre_produto)
                        <option value="{{ $id }}" {{ old('nombre_produto_id') == $id ? 'selected' : '' }}>{{ $nombre_produto }}</option>
                    @endforeach
                </select>
                @if($errors->has('nombre_produto_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_produto_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pedido.fields.nombre_produto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tamanio_id">{{ trans('cruds.pedido.fields.tamanio') }}</label>
                <select class="form-control select2 {{ $errors->has('tamanio') ? 'is-invalid' : '' }}" name="tamanio_id" id="tamanio_id" required>
                    @foreach($tamanios as $id => $tamanio)
                        <option value="{{ $id }}" {{ old('tamanio_id') == $id ? 'selected' : '' }}>{{ $tamanio }}</option>
                    @endforeach
                </select>
                @if($errors->has('tamanio_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tamanio_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pedido.fields.tamanio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cantidad">{{ trans('cruds.pedido.fields.cantidad') }}</label>
                <input class="form-control {{ $errors->has('cantidad') ? 'is-invalid' : '' }}" type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" step="1" required>
                @if($errors->has('cantidad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cantidad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pedido.fields.cantidad_helper') }}</span>
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