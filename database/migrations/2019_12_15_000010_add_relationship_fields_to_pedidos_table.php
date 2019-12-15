<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPedidosTable extends Migration
{
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->unsignedInteger('nombre_produto_id');

            $table->foreign('nombre_produto_id', 'nombre_produto_fk_734964')->references('id')->on('productos');

            $table->unsignedInteger('tamanio_id');

            $table->foreign('tamanio_id', 'tamanio_fk_734965')->references('id')->on('presentaciones');

            $table->unsignedInteger('cliente_id');

            $table->foreign('cliente_id', 'cliente_fk_734992')->references('id')->on('clientes');
        });
    }
}
