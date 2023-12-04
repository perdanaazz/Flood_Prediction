<?php

namespace Database\Seeders;

use App\Models\CurahHujan;
use App\Models\Kota;
use App\Models\Situasi;
use Illuminate\Database\Seeder;

class CurahHujanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situasi_true = Situasi::create([
            'situasi' => 'Banjir'
        ]);
        $situasi_false = Situasi::create([
            'situasi' => 'Tidak Banjir'
        ]);

        $kota = Kota::create([
            'nama_kecamatan'      => 'Tulungagung',
            'nama_kota_kabupaten' => 'Tulungagung',
            'nama_provinsi'       => 'Jawa Timur',
            'longitude'           => '111.9040',
            'latitude'            => '-8.0882',
        ]);

        CurahHujan::create([
            'id_kota'    => $kota->id,
            'id_situasi' => $situasi_false->id,
            'tahun'      => 2011,
            'jan'        => 145.6,
            'feb'        => 230.7,
            'mar'        => 147.7,
            'apr'        => 106.8,
            'mei'        => 198.9,
            'jun'        => 70.5,
            'jul'        => 18.1,
            'ags'        => 1.5,
            'sep'        => 52.6,
            'okt'        => 80.1,
            'nov'        => 44.6,
            'des'        => 177
        ]);

        $kota = Kota::create([
            'nama_kecamatan'      => 'Kalangbret',
            'nama_kota_kabupaten' => 'Tulungagung',
            'nama_provinsi'       => 'Jawa Timur',
            'longitude'           => '111.8613',
            'latitude'            => '-8.0368',
        ]);

        CurahHujan::create([
            'id_kota'    => $kota->id,
            'id_situasi' => $situasi_false->id,
            'tahun'      => 2011,
            'jan'        => 145.6,
            'feb'        => 230.7,
            'mar'        => 147.7,
            'apr'        => 106.8,
            'mei'        => 198.9,
            'jun'        => 70.5,
            'jul'        => 18.1,
            'ags'        => 1.5,
            'sep'        => 52.6,
            'okt'        => 80.1,
            'nov'        => 44.6,
            'des'        => 177
        ]);
    }
}
