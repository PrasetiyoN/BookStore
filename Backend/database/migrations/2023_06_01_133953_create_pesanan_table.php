<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('idpesanan');
            $table->string('user_email');
            $table->foreign('user_email')->references('email')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('buku_idbuku');
            $table->foreign('buku_idbuku')->references('idbuku')->on('buku')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pesanan');
    }
}
