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
        Schema::create('tb_kost', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->longText('alamat');
            $table->text('maps');
            $table->longText('deskripsi');
            $table->string('no_pemilik');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kost');
    }
};
