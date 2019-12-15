<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cantidad');

            $table->float('req_leche', 15, 4)->nullable();

            $table->float('req_bacteria', 15, 4)->nullable();

            $table->float('req_saborizante', 15, 4)->nullable();

            $table->float('req_colorante', 15, 4)->nullable();

            $table->integer('req_envases')->nullable();

            $table->float('costo_unitario', 15, 4)->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
