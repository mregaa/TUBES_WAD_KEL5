<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            // Drop the foreign key constraints
            $table->dropForeign(['penjual_id']); // Replace 'penjual_id' with the actual foreign key name if different
            $table->dropColumn('penjual_id');
            $table->dropColumn('kode_tenant');
            $table->dropForeign(['kode_tenant']); // Replace 'penjual_id' with the actual foreign key name if different

        });
        Schema::table('penjuals', function (Blueprint $table) {
            // Drop the foreign key constraints
            $table->dropUnique(['kode_tenant']); // Replace 'penjual_id' with the actual foreign key name if different
        });

        // Drop the 'penjuals' table
        Schema::dropIfExists('penjuals');

    }

    public function down()
    {
        Schema::create('penjuals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tenant')->nullable();
            $table->string('nama_penjual');
            $table->text('deskripsi')->nullable();
            $table->string('no_hp');
            $table->timestamps();
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->unsignedBigInteger('penjual_id')->nullable();
            $table->foreign('penjual_id')->references('id')->on('penjuals')->onDelete('cascade');
            $table->string('kode_tenant')->nullable();
        });


    }

};
