<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Http\Resources\Admin\ClienteResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClienteResource(Cliente::all());
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());

        return (new ClienteResource($cliente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClienteResource($cliente);
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return (new ClienteResource($cliente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
