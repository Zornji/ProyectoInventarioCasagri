<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEquipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table__equipo', function (Blueprint $table) {
            $table->id();
            $table->Integer('compañia');
            $table->String('nombre');
            $table->String('ip');
            $table->String('dpto');
            $table->String('usuario');
            $table->Integer('monitor_id');
            $table->Integer('disco_id');
            $table->Integer('tarjeta_id');
            $table->Integer('ram_id');
            $table->Integer('sistema_id');
            $table->Integer('procesador_id');
            $table->String('observacion');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table__equipo');
    }
}
