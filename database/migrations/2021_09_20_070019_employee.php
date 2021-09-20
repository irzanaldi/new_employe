<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id_employee');
            $table->string('nama');
            $table->string('email');
            $table->integer('mobile_number');
            $table->string('kota');
            $table->string('gender');
            $table->integer('id_department');
            $table->date('hire');
            $table->rememberToken();
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
