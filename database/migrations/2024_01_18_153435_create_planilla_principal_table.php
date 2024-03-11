<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillaPrincipalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planilla_principal', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->integer('id_empresa_planilla');
            $table->string('nombre');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->integer('t_isss');
            $table->integer('t_afp');
            $table->integer('t_isr');
            $table->integer('t_salario');
            $table->integer('total_Neto');            // Otros campos que puedas necesitar

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
        Schema::dropIfExists('planilla');
    }
}
