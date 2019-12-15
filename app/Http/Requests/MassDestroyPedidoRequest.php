<?php

namespace App\Http\Requests;

use App\Pedido;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPedidoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pedido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pedidos,id',
        ];
    }
}
