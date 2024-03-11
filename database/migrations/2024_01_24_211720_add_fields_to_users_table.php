<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telefono');
            $table->string('estado');
            $table->string('cargo');
            $table->string('dui');
            $table->Integer('empresa_id');
            $table->Integer('sucursal_id');
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
            $table->dropColumn('telefono');
            $table->dropColumn('estado');
            $table->dropColumn('cargo');
            $table->dropColumn('dui');
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['sucursal_id']);
            $table->dropColumn('empresa_id');
            $table->dropColumn('sucursal_id');
        });
    }
}
