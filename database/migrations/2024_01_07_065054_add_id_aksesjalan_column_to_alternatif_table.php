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
            $table->unsignedBigInteger('id_aksesjalan')->nullable();
            $table->foreign('id_aksesjalan')->references('id')->on('tb_aksesjalan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_alternatif', function (Blueprint $table) {
            $table->dropForeign(['id_aksesjalan']);
            $table->dropColumn(['id_aksesjalan']);
        });
    }
};
