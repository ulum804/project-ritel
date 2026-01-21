<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gudang')->insert([
            'nama_gudang' => 'cabang 1',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        DB::table('gudang')->insert([
            'nama_gudang' => 'cabang 2',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        DB::table('gudang')->insert([
            'nama_gudang' => 'Gudang Reject',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        DB::table('gudang')->insert([
            'nama_gudang' => 'Gudang Utama',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
