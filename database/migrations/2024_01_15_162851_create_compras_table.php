<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('fecha',15);
            $table->string('hora',15);
            $table->string('tipo_comprobante',50);
            $table->string('numero_comprobante',75);
            $table->string('resp_compra',50);
            $table->integer('user_compra');
            $table->string('monto',10);
            $table->string('observaciones',200);
            $table->string('comercio',200);
            $table->string('img_comprobante',250);
            $table->integer('sucursal_id');
            $table->integer('empresa_id');
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
        Schema::dropIfExists('compras');
    }
}
