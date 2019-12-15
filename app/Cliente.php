<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nit',
        'created_at',
        'updated_at',
        'deleted_at',
        'nombre_empresa',
    ];

    public function clientePedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id', 'id');
    }
}
