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
        Schema::create('jamaahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap_jamaah');
            $table->bigInteger('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('kecamatan');
            $table->string('kelurahan_desa');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_paspor');
            $table->date('masa_berlaku_paspor');
            $table->string('no_visa');
            $table->date('masa_berlaku_visa');
            $table->string('lampiran_ktp');
            $table->string('lampiran_kk');
            $table->string('lampiran_foto_diri');
            $table->string('lampiran_paspor');
            $table->enum('paket_dipilih', ['Paket Itikaf', 'Paket Reguler', 'Paket VIP']);
            $table->enum('kamar_dipilih', ['Quint', 'Quad', 'Triple', 'Double', 'Single']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaahs');
    }
};
