<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRuangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_ruangan', function (Blueprint $table) {
            $table->bigIncrements('truangan_id');
            $table->string('truangan_nama');
            $table->bigInteger('truangan_jurusan')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('table_ruangan', function($table) {
            $table->foreign('truangan_jurusan')->references('tjurusan_id')->on('table_jurusan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_ruangan');
    }
}
