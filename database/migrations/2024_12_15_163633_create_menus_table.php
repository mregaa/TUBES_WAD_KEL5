<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tenant');
            $table->string('nama_menu');
            $table->text('deskripsi')->nullable();
            $table->integer('harga');
            $table->integer('stok');
            $table->enum('status', ['tersedia','tidak_tersedia'])->default('tersedia');
            $table->unsignedBigInteger('penjual_id');
            $table->timestamps();

            $table->foreign('penjual_id')->references('id')->on('penjuals')->onDelete('cascade');
            $table->foreign('kode_tenant')->references('kode_tenant')->on('penjuals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
