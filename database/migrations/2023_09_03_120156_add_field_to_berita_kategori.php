<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToBeritaKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berita_kategori', function (Blueprint $table) {
            $table->unsignedBigInteger('berita_id')->after('id');
            $table->unsignedBigInteger('kategori_id')->after('berita_id');
            $table->foreign('berita_id')->references('id')->on('berita');
            $table->foreign('kategori_id')->references('id')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berita_kategori', function (Blueprint $table) {
            $table->unsignedBigInteger('berita_id');
            $table->unsignedBigInteger('kategori_id');
        });
    }
}
