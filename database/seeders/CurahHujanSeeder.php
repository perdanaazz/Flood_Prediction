<?php

namespace Database\Seeders;

use App\Models\CurahHujan;
use Illuminate\Database\Seeder;

class CurahHujanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CurahHujan::create([
            'tahun' => 2011,
            'jan' => 145.6,
            'feb' => 230.7,
            'mar' => 147.7,
            'apr' => 106.8,
            'mei' => 198.9,
            'jun' => 70.5,
            'jul' => 18.1,
            'ags' => 1.5,
            'sep' => 52.6,
            'okt' => 80.1,
            'nov' => 44.6,
            'des' => 177
        ]);
    }
}
