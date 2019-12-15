@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cliente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.id') }}
                        </th>
                        <td>
                            {{ $cliente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nit') }}
                        </th>
                        <td>
                            {{ $cliente->nit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nombre_empresa') }}
                        </th>
                        <td>
                            {{ $cliente->nombre_empresa }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
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
            <a class="nav-link" href="#cliente_pedidos" role="tab" data-toggle="tab">
                {{ trans('cruds.pedido.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="cliente_pedidos">
            @includeIf('admin.clientes.relationships.clientePedidos', ['pedidos' => $cliente->clientePedidos])
        </div>
    </div>
</div>

@endsection