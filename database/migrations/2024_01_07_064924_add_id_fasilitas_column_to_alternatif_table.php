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
        Schema::table('tb_alternatif', function (Blueprint $table) {
            $table->unsignedBigInteger('id_fasilitas')->nullable();
            $table->foreign('id_fasilitas')->references('id')->on('tb_fasilitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_alternatif', function (Blueprint $table) {
            $table->dropForeign(['id_fasilitas']);
            $table->dropColumn(['id_fasilitas']);
        });
    }
};
