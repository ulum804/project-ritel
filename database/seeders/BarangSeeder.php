<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            'kode_barang' => 'BRG001',
            'nama_barang' => 'Beras Premium',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        DB::table('barang')->insert([
            'kode_barang' => 'BRG002',
            'nama_barang' => 'Minyak Goreng',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        DB::table('barang')->insert([
            'kode_barang' => 'BRG003',
            'nama_barang' => 'Gula Pasir',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}