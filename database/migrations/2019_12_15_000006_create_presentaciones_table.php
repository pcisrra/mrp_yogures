<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentacionesTable extends Migration
{
    public function up()
    {
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->increments('id');

            $table->float('capacidad', 10, 2);

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
