<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jumlah');
            $table->date('tanggal');
            $table->bigInteger('id_users')->unsigned();
            $table->string('id_cow')->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_cow')->references('kode')->on('cow');
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
        Schema::dropIfExists('milk');
    }
};
