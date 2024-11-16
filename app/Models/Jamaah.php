<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;
    protected $table = 'jamaahs';
    protected $fillable = [
        'nama_lengkap_jamaah',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'provinsi',
        'kab_kota',
        'kecamatan',
        'kelurahan_desa',
        'jenis_kelamin',
        'no_paspor',
        'masa_berlaku_paspor',
        'no_visa',
        'masa_berlaku_visa',
        'lampiran_ktp',
        'lampiran_kk',
        'lampiran_foto_diri',
        'lampiran_paspor',
        'paket_dipilih',
        'kamar_dipilih',
    ];
}
