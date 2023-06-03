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
            $table->id('idbuku');
            $table->string('judul_buku');
            $table->string('penulis');
            $table->string('gambar');
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('user_email');
            $table->foreign('user_email')->references('email')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status_buku', ['publish', 'unpublish'])->default('unpublish');
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
