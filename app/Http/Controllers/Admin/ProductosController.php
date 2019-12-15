<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductoRequest;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Producto;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('producto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productos = Producto::all();

        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        abort_if(Gate::denies('producto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productos.create');
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = Producto::create($request->all());

        return redirect()->route('admin.productos.index');
    }

    public function edit(Producto $producto)
    {
        abort_if(Gate::denies('producto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productos.edit', compact('producto'));
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->all());

        return redirect()->route('admin.productos.index');
    }

    public function show(Producto $producto)
    {
        abort_if(Gate::denies('producto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producto->load('nombreProdutoPedidos');

        return view('admin.productos.show', compact('producto'));
    }

    public function destroy(Producto $producto)
    {
        abort_if(Gate::denies('producto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producto->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductoRequest $request)
    {
        Producto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
