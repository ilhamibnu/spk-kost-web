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
        Schema::table('tb_detail_foto_kost', function (Blueprint $table) {
            $table->foreignId('id_kost')->after('id')->constrained('tb_kost')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_detail_foto_kost', function (Blueprint $table) {
            $table->dropForeign(['id_kost']);
            $table->dropColumn('id_kost');
        });
    }
};
