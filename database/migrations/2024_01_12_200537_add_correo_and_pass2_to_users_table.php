<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCorreoAndPass2ToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar el campo 'correo' después del campo 'name'
            $table->string('correo')->after('usuario');
            
            // Agregar el campo 'pass2' después del campo 'password'
            $table->string('pass2')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revertir la operación en caso de hacer un rollback
            $table->dropColumn('correo');
            $table->dropColumn('pass2');
        });
    }
}
