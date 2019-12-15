<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Http\Resources\Admin\PedidoResource;
use App\Pedido;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PedidosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pedido_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PedidoResource(Pedido::with(['cliente', 'nombre_produto', 'tamanio'])->get());
    }

    public function store(StorePedidoRequest $request)
    {
        $pedido = Pedido::create($request->all());

        return (new PedidoResource($pedido))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pedido $pedido)
    {
        abort_if(Gate::denies('pedido_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PedidoResource($pedido->load(['cliente', 'nombre_produto', 'tamanio']));
    }

    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        $pedido->update($request->all());

        return (new PedidoResource($pedido))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pedido $pedido)
    {
        abort_if(Gate::denies('pedido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pedido->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
