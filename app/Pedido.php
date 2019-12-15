<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cantidad',
        'req_leche',
        'cliente_id',
        'tamanio_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'req_envases',
        'req_bacteria',
        'req_colorante',
        'costo_unitario',
        'req_saborizante',
        'nombre_produto_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function nombre_produto()
    {
        return $this->belongsTo(Producto::class, 'nombre_produto_id');
    }

    public function tamanio()
    {
        return $this->belongsTo(Presentacione::class, 'tamanio_id');
    }
}
