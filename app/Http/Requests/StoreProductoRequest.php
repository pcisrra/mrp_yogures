<?php

namespace App\Http\Requests;

use App\Producto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProductoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('producto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required',
            ],
        ];
    }
}
