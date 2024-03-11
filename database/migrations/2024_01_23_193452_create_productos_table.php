<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('producto',175);
            $table->integer('categoria_id');
            $table->string('perecedero',3);
            $table->string('rotacion_rapida',3);
            $table->string('control_stock_min',3);
            $table->integer('usuario_id');
            $table->integer('empresa_id');
            $table->integer('sucursal_id');
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
        Schema::dropIfExists('productos');
    }
}
