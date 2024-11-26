<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data Mahasiswa yang ingin diisi secara manual
        DB::table('mahasiswa')->insert([
           /* [
                'nim' => '2022903430010',
                'nama' => 'Diki Candra',
                'prodi_id' => 2, // ID Prodi, sesuaikan dengan data yang ada di tabel prodi
                'email' => 'dikisyandra@gmail.com',
                'nomor_hp' => '085200490054',
                'jenis_kelamin' => 1, // 1 untuk Laki-laki, 0 untuk Perempuan
                'tempat_lahir' => 'Aceh Utara, Nibong',
                'tanggal_lahir' => '2004-05-28',
                'golongan_darah' => 'O',
                'created_at' => now(),
                'updated_at' => now(),
            ],*/
            [
                'nim' => '2022903430048',
                'nama' => 'Nasywa Deby Azanna',
                'prodi_id' => 2, // ID Prodi, sesuaikan dengan data yang ada di tabel prodi
                'email' => 'nasywadeby80@gmail.com',
                'nomor_hp' => '081234567891',
                'jenis_kelamin' => 0, // 0 untuk Perempuan
                'tempat_lahir' => 'Cunda',
                'tanggal_lahir' => '2004-11-27',
                'golongan_darah' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data mahasiswa lainnya di sini jika diperlukan
        ]);
    }
}
