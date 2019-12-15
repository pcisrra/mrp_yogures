<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPresentacioneRequest;
use App\Http\Requests\StorePresentacioneRequest;
use App\Http\Requests\UpdatePresentacioneRequest;
use App\Presentacione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresentacionesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presentacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentaciones = Presentacione::all();

        return view('admin.presentaciones.index', compact('presentaciones'));
    }

    public function create()
    {
        abort_if(Gate::denies('presentacione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.presentaciones.create');
    }

    public function store(StorePresentacioneRequest $request)
    {
        $presentacione = Presentacione::create($request->all());

        return redirect()->route('admin.presentaciones.index');
    }

    public function edit(Presentacione $presentacione)
    {
        abort_if(Gate::denies('presentacione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.presentaciones.edit', compact('presentacione'));
    }

    public function update(UpdatePresentacioneRequest $request, Presentacione $presentacione)
    {
        $presentacione->update($request->all());

        return redirect()->route('admin.presentaciones.index');
    }

    public function show(Presentacione $presentacione)
    {
        abort_if(Gate::denies('presentacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentacione->load('tamanioPedidos');

        return view('admin.presentaciones.show', compact('presentacione'));
    }

    public function destroy(Presentacione $presentacione)
    {
        abort_if(Gate::denies('presentacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentacione->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresentacioneRequest $request)
    {
        Presentacione::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
