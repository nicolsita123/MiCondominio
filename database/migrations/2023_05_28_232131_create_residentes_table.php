<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residentes', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_RESIDENTE')->autoIncrement();
            $table->INTEGER('NUM_RUT');
            $table->INTEGER('DV_RUT');
            $table->STRING('NOM_RESIDENTE');
            $table->STRING('SEG_NOM_RESIDENTE');
            $table->STRING('APELLIDO_PA');
            $table->STRING('APELLIDO_MA');
            $table->DATE('FECHA_NACIMIENTO');
            $table->STRING('CORREO_RESIDENTE');
            $table->STRING('CONTRASENA_RESIDENTE');
            $table->STRING('DIRECCION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residente');
    }
};
