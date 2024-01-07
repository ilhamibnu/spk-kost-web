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
            $table->unsignedBigInteger('id_jarak')->nullable();
            $table->foreign('id_jarak')->references('id')->on('tb_jarak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_kost', function (Blueprint $table) {
            $table->dropForeign(['id_jarak']);
            $table->dropColumn(['id_jarak']);
        });
    }
};
