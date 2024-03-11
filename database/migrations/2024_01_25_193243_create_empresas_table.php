<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('correo');
            $table->string('celular');
            $table->string('telefono');
            $table->string('logo');
            $table->string('rubro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
