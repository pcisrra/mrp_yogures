<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nit');

            $table->string('nombre_empresa');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
