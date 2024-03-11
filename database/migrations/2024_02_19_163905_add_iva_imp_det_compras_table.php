<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIvaImpDetComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('det_compras', function (Blueprint $table) {
            $table->decimal('iva', 8, 2)->after('subtotal');
            $table->decimal('impuestos', 8, 2)->after('iva');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('det_compras', function (Blueprint $table) {
            //
        });
    }
}
