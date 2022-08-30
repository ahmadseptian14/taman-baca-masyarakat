<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('kategori_id');
            $table->integer('tbm_id');
            $table->string('judul');
            $table->string('foto');
            $table->string('penulis');
            $table->string('penerbit');
            $table->bigInteger('isbn');
            $table->integer('stok_tersedia');
            $table->integer('stok_pinjam')->nullable();
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
        Schema::dropIfExists('buku');
    }
}
