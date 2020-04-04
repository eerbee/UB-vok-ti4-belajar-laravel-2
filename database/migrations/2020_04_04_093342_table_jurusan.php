<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_jurusan', function (Blueprint $table) {
            $table->bigIncrements('tjurusan_id');
            $table->string('tjurusan_nama');
            $table->bigInteger('tjurusan_fakultas')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('table_jurusan', function($table) {
            $table->foreign('tjurusan_fakultas')->references('tfakultas_id')->on('table_fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_jurusan');
    }
}
