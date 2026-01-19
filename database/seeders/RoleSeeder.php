<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            // [
            //     'jabatan' => 'Staff',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'jabatan' => 'Kepala Gudang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
