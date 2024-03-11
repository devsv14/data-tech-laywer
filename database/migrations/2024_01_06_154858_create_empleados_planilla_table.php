<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosPlanillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_planilla', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('dui');
            $table->string('isss');
            $table->string('afp');
            $table->string('nit');  
            $table->string('cargo');
            $table->date('fecha_ingreso');
            $table->date('fecha_nacimiento');
            $table->string('domicilio');
            $table->string('correo');
            $table->decimal('salario', 10, 2);
            $table->string('descuento');
            $table->Integer('id_empresa'); // Nuevo campo
            $table->string('empresa_planilla'); // Nuevo campo
            $table->Integer('id_usuario')->nullable();
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
        Schema::dropIfExists('empleados_planilla');
    }
}
