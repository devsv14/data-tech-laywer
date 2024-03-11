<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->integer('id_empresa_planilla');
            $table->integer('id_empleado');
            $table->integer('id_planilla');
            $table->float('dias_trabajados');
            $table->float('sueldo_diario');
            $table->float('sueldo_hora');
            $table->float('salario_base');
            $table->float('salario_quincenal');
            $table->float('subtotal_devengado');
            $table->float('total_devengado');
            $table->float('cant_horas');
            $table->float('horas_extra');
            $table->float('bonificaciones');
            $table->float('vacaciones');
            $table->float('isss');
            $table->float('afp');
            $table->float('renta_inponible');
            $table->float('isr');
            $table->float('otros_desc');
            $table->float('llegadas_tarde');
            $table->float('prestamos');
            $table->float('dias_injustificados');
            $table->float('adelanto_salarial');
            $table->float('total_ingresos');
            $table->float('total_descuentos');
            $table->float('total_neto');
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
        Schema::dropIfExists('planillas');
    }
}
