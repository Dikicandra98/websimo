<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodi')->insert([
            ['program_studi'=>'Teknik_Informatika'],
            ['program_studi'=>'Teknologi Rekayasa Komputer Jaringan'],
            ['program_studi'=>'Teknologi Rekayasa Multimedia'],
            ['program_studi'=>'Teknologi Rekayasa Perangkat Lunak'],

        ]);
    }
}