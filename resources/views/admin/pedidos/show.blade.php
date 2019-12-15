@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pedido.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pedidos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.id') }}
                        </th>
                        <td>
                            {{ $pedido->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.cliente') }}
                        </th>
                        <td>
                            {{ $pedido->cliente->nombre_empresa ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.nombre_produto') }}
                        </th>
                        <td>
                            {{ $pedido->nombre_produto->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.tamanio') }}
                        </th>
                        <td>
                            {{ $pedido->tamanio->capacidad ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.cantidad') }}
                        </th>
                        <td>
                            {{ $pedido->cantidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.req_leche') }}
                        </th>
                        <td>
                            {{ $pedido->req_leche }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.req_bacteria') }}
                        </th>
                        <td>
                            {{ $pedido->req_bacteria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.req_saborizante') }}
                        </th>
                        <td>
                            {{ $pedido->req_saborizante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.req_colorante') }}
                        </th>
                        <td>
                            {{ $pedido->req_colorante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.req_envases') }}
                        </th>
                        <td>
                            {{ $pedido->req_envases }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pedido.fields.costo_unitario') }}
                        </th>
                        <td>
                            {{ $pedido->costo_unitario }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pedidos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection