<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPedidoRequest;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Pedido;
use App\Presentacione;
use App\Producto;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PedidosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pedido_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pedidos = Pedido::all();

        return view('admin.pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        abort_if(Gate::denies('pedido_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::all()->pluck('nombre_empresa', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_produtos = Producto::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tamanios = Presentacione::all()->pluck('capacidad', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pedidos.create', compact('clientes', 'nombre_produtos', 'tamanios'));
    }

    public function store(StorePedidoRequest $request)
    {
        $pedido = Pedido::create($request->all());

        return redirect()->route('admin.pedidos.index');
    }

    public function edit(Pedido $pedido)
    {
        abort_if(Gate::denies('pedido_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::all()->pluck('nombre_empresa', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_produtos = Producto::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tamanios = Presentacione::all()->pluck('capacidad', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pedido->load('cliente', 'nombre_produto', 'tamanio');

        return view('admin.pedidos.edit', compact('clientes', 'nombre_produtos', 'tamanios', 'pedido'));
    }

    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        $pedido->update($request->all());

        return redirect()->route('admin.pedidos.index');
    }

    public function show(Pedido $pedido)
    {
        abort_if(Gate::denies('pedido_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pedido->load('cliente', 'nombre_produto', 'tamanio');

        return view('admin.pedidos.show', compact('pedido'));
    }

    public function destroy(Pedido $pedido)
    {
        abort_if(Gate::denies('pedido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pedido->delete();

        return back();
    }

    public function massDestroy(MassDestroyPedidoRequest $request)
    {
        Pedido::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
