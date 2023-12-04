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
        Schema::create('data_sungais', function (Blueprint $table) {
            $table->id();
            $table->string('id_sungai');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('nama_sungai');
            $table->float('penambahan_debit_alami_sungai_musim_penghujan');
            $table->float('penambahan_debit_alami_sungai_musim_non_penghujan');
            $table->float('curah_hujan');
            $table->float('debit_alami_sungai');
            $table->float('ketersediaan_air_tanah_tahunan');
            $table->float('irigasi');
            $table->float('penggunaan_industri_dan_domestik');
            $table->float('total_penggunaan');
            $table->float('ketersediaan_air_tanah_untuk_irigasi_masa_depan');

            // Feature Simplify
            $table->float('main_curah_hujan');
            $table->float('main_debit_penggunaan')->comment('discharge');
            $table->float('main_elevasi_air');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sungais');
    }
};
