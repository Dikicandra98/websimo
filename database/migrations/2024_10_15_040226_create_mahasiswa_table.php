<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {

            $table->id();
            $table->char('nim',13)->unique();
            $table->string('nama',100);
            $table->foreignId('prodi_id')->constrained('prodi');
            $table->string('email',100)->unique();
            $table->string('nomor_hp',15)->unique();
            $table->boolean('jenis_kelamin')->default(true);
            $table->string('tempat_lahir',100);
            $table->string('tanggal_lahir');
            $table->char('golongan_darah',2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};