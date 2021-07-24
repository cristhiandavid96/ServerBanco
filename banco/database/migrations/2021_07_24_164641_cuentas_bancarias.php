<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CuentasBancarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_bancarias', function (Blueprint $table) {
            $table->id();
            $table->string('numero',100);
            $table->smallInteger('estado');
            $table->integer('usuario_id');
            $table->bigInteger('valor');
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
        //
    }
}
