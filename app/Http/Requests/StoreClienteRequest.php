<?php

namespace App\Http\Requests;

use App\Cliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreClienteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cliente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nit'            => [
                'required',
            ],
            'nombre_empresa' => [
                'required',
            ],
        ];
    }
}
