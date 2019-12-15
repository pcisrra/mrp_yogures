<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Resources\Admin\ProductoResource;
use App\Producto;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('producto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductoResource(Producto::all());
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = Producto::create($request->all());

        return (new ProductoResource($producto))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Producto $producto)
    {
        abort_if(Gate::denies('producto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductoResource($producto);
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->all());

        return (new ProductoResource($producto))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Producto $producto)
    {
        abort_if(Gate::denies('producto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producto->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
