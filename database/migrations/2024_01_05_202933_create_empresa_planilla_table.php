<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaPlanillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_planilla', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('imagen')->nullable(); // Puedes usar nullable si la imagen es opcional
            $table->Integer('id_empresa')->nullable();
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
        Schema::dropIfExists('empresa_planilla');
    }
}