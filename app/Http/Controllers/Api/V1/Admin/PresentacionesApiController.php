<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresentacioneRequest;
use App\Http\Requests\UpdatePresentacioneRequest;
use App\Http\Resources\Admin\PresentacioneResource;
use App\Presentacione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresentacionesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presentacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresentacioneResource(Presentacione::all());
    }

    public function store(StorePresentacioneRequest $request)
    {
        $presentacione = Presentacione::create($request->all());

        return (new PresentacioneResource($presentacione))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Presentacione $presentacione)
    {
        abort_if(Gate::denies('presentacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresentacioneResource($presentacione);
    }

    public function update(UpdatePresentacioneRequest $request, Presentacione $presentacione)
    {
        $presentacione->update($request->all());

        return (new PresentacioneResource($presentacione))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Presentacione $presentacione)
    {
        abort_if(Gate::denies('presentacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presentacione->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
