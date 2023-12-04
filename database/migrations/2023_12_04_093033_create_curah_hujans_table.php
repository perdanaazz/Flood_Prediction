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
        Schema::create('curah_hujans', function (Blueprint $table) {
            $table->id();

            $table->float('tahun');
            $table->float('jan');
            $table->float('feb');
            $table->float('mar');
            $table->float('apr');
            $table->float('mei');
            $table->float('jun');
            $table->float('jul');
            $table->float('ags');
            $table->float('sep');
            $table->float('okt');
            $table->float('nov');
            $table->float('des');

            // $table->unsignedBigfloat('id_kota');
            // $table->unsignedBigfloat('id_situasi');

            // $table
            //     ->foreign('id_kota')
            //     ->references('id')
            //     ->on('kotas')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');
            // $table
            //     ->foreign('id_situasi')
            //     ->references('id')
            //     ->on('situasis')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curah_hujans');
    }
};
