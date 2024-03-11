<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_compras', function (Blueprint $table) {
            $table->id();
            $table->string('producto',175);
            $table->string('numero_comprobante',75);
            $table->string('precio_unitario',10);
            $table->string('cantidad',10);
            $table->string('umedida',10);
            $table->float('subtotal',10,2);
            $table->string('categoria_id',12);
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
        Schema::dropIfExists('det_compras');
    }
}
