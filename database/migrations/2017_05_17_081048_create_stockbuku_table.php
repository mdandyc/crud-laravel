<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockbukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerbit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',35);
            $table->string('alamat',40);
            $table->string('kontak',25);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',35);
            $table->string('harga_jual',15);
            $table->string('harga_dasar',15);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('stockbuku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tgl_masuk',35);
            $table->integer('buku_id');
            $table->integer('penerbit_id');
            $table->integer('jumlah');
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
        Schema::dropIfExists('penerbit');
        Schema::dropIfExists('buku');
        Schema::dropIfExists('stockbuku');
    }
}
