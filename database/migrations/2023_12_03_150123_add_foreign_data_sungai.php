<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('data_sungais', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_situasi');

            $table
                ->foreign('id_kota')
                ->references('id')
                ->on('kotas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table
                ->foreign('id_situasi')
                ->references('id')
                ->on('situasis')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_sungais', function (Blueprint $table) {
            $table->dropColumn('id_kota');
            $table->dropColumn('id_situasi');
        });
    }
};
