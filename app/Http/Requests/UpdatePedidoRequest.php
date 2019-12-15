<?php

namespace App\Http\Requests;

use App\Pedido;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePedidoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pedido_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'cliente_id'        => [
                'required',
                'integer',
            ],
            'nombre_produto_id' => [
                'required',
                'integer',
            ],
            'tamanio_id'        => [
                'required',
                'integer',
            ],
            'cantidad'          => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
