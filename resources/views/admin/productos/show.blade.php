@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.producto.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.productos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.producto.fields.id') }}
                        </th>
                        <td>
                            {{ $producto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producto.fields.nombre') }}
                        </th>
                        <td>
                            {{ $producto->nombre }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.productos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#nombre_produto_pedidos" role="tab" data-toggle="tab">
                {{ trans('cruds.pedido.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="nombre_produto_pedidos">
            @includeIf('admin.productos.relationships.nombreProdutoPedidos', ['pedidos' => $producto->nombreProdutoPedidos])
        </div>
    </div>
</div>

@endsection