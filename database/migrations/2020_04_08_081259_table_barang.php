<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_barang', function (Blueprint $table) {
            $table->bigIncrements('tbarang_id');
            $table->string('tbarang_nama');
            $table->bigInteger('tbarang_total');
            $table->bigInteger('tbarang_broken');
            $table->bigInteger('tbarang_ruangan')->unsigned()->nullable();
            $table->string('tbarang_gambar')->nullable();
            $table->bigInteger('tbarang_created_by')->unsigned()->nullable()->default(1);
            $table->bigInteger('tbarang_updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('table_barang', function($table) {
            $table->foreign('tbarang_ruangan')->references('truangan_id')->on('table_ruangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_barang');
    }
}
