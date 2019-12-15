<?php

namespace App\Http\Requests;

use App\Producto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('producto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
