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
        Schema::table('tb_kost', function (Blueprint $table) {
            $table->unsignedBigInteger('id_harga')->nullable();
            $table->foreign('id_harga')->references('id')->on('tb_harga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_kost', function (Blueprint $table) {
            $table->dropForeign(['id_harga']);
            $table->dropColumn(['id_harga']);
        });
    }
};
