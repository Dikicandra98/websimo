<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    // Method index untuk menampilkan daftar mahasiswa
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::when($request->q, function ($query) use ($request) {
            return $query->where('nama', 'like', '%' . $request->q . '%');
        })->paginate(5);

        return new MahasiswaResource(true, 'List Data Mahasiswa', $mahasiswas);
    }

    // Method store untuk menyimpan data mahasiswa
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:mahasiswa', // Pastikan nim unik
            'nama' => 'required|string|max:255',  // Pastikan nama ada dan maksimal 255 karakter
            'prodi_id' => 'required|exists:prodi,id', // Pastikan prodi_id valid
            'email' => 'nullable|email|max:255', // email opsional jika tidak ada
            'nomor_hp' => 'nullable|string|max:15', // nomor_hp opsional jika tidak ada
            'jenis_kelamin' => 'nullable|in:0,1', // jenis_kelamin opsional, 0 untuk perempuan, 1 untuk laki-laki
            'tempat_lahir' => 'nullable|string|max:255', // tempat_lahir opsional
            'tanggal_lahir' => 'nullable|date', // tanggal_lahir opsional, pastikan format tanggal valid
            'golongan_darah' => 'nullable|string|max:3', // golongan_darah opsional
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buat data mahasiswa baru
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi_id' => $request->prodi_id,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan_darah' => $request->golongan_darah,
        ]);

        // Kembalikan response sukses
        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Disimpan!', $mahasiswa);
    }

    // Method show untuk menampilkan detail mahasiswa
    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaResource(true, 'Detail Data Mahasiswa!', $mahasiswa);
    }

    // Method update untuk memperbarui data mahasiswa
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:mahasiswa,nama,' . $mahasiswa->id, // Nama harus unik, kecuali untuk data yang sedang di-update
            'prodi_id' => 'required|exists:prodi,id',  // Pastikan prodi_id valid
            'email' => 'nullable|email|max:255',  // Email opsional
            'nomor_hp' => 'nullable|string|max:15', // Nomor HP opsional
            'jenis_kelamin' => 'nullable|in:0,1', // jenis_kelamin opsional, 0 untuk perempuan, 1 untuk laki-laki
            'tempat_lahir' => 'nullable|string|max:255', // tempat_lahir opsional
            'tanggal_lahir' => 'nullable|date', // tanggal_lahir opsional
            'golongan_darah' => 'nullable|string|max:3', // golongan_darah opsional
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update data mahasiswa
        $mahasiswa->update([
            'nim' => $request->nim, // Pastikan nim bisa diupdate jika diperlukan
            'nama' => $request->nama,
            'prodi_id' => $request->prodi_id,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan_darah' => $request->golongan_darah,
        ]);

        // Kembalikan response sukses
        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Diupdate!', $mahasiswa);
    }

    // Method destroy untuk menghapus data mahasiswa
    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->delete()) {
            return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Dihapus!', null);
        }

        return new MahasiswaResource(false, 'Data Mahasiswa Gagal Dihapus!', null);
    }
}
