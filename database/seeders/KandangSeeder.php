<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KandangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('kandang')->insert([
            [
                'kandang' => 'Kandang A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kandang' => 'Kandang B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kandang' => 'Kandang C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
