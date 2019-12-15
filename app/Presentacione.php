<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presentacione extends Model
{
    use SoftDeletes;

    public $table = 'presentaciones';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'capacidad',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tamanioPedidos()
    {
        return $this->hasMany(Pedido::class, 'tamanio_id', 'id');
    }
}
