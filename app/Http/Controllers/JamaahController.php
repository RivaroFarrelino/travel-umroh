<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    public function index(Request $request){
        $jamaahs = Jamaah::all();

        if($request->wantsJson()){
            return response()->json($jamaahs);
        }

        return view('jamaah.index')->with('jamaahs', $jamaahs);
    }

    public function store(Request $request){

        try{

            $validatedData = $request->validate([
                'nama_lengkap_jamaah' => 'required|string|max:255',
                'nik' => 'required|numeric',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string',
                'provinsi' => 'required|string',
                'kabupaten_kota' => 'required|string',
                'kecamatan' => 'required|string',
                'kelurahan_desa' => 'required|string',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'no_paspor' => 'required|string|max:255',
                'masa_berlaku_paspor' => 'required|date',
                'no_visa' => 'required|string|max:255',
                'masa_berlaku_visa' => 'required|date',
                'lampiran_ktp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240',
                'lampiran_kk' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240',
                'lampiran_foto_diri' => 'required|file|mimes:jpeg,png,jpg|max:10240',
                'lampiran_paspor' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240',
                'paket_dipilih' => 'required|in:Paket Itikaf,Paket Reguler,Paket VIP',
                'kamar_dipilih' => 'required|in:Quint,Quad,Triple,Double,Single',
            ]);
    
            $lampiranKtpPath = $request->file('lampiran_ktp')->store('lampiran/ktp');
            $lampiranKkPath = $request->file('lampiran_kk')->store('lampiran/kk');
            $lampiranFotoDiriPath = $request->file('lampiran_foto_diri')->store('lampiran/foto_diri');
            $lampiranPasporPath = $request->file('lampiran_paspor')->store('lampiran/paspor');
    
            $jamaah = new Jamaah();
            $jamaah->nama_lengkap_jamaah = $validatedData['nama_lengkap_jamaah'];
            $jamaah->nik = $validatedData['nik'];
            $jamaah->tempat_lahir = $validatedData['tempat_lahir'];
            $jamaah->tanggal_lahir = $validatedData['tanggal_lahir'];
            $jamaah->alamat = $validatedData['alamat'];
            $jamaah->provinsi = $validatedData['provinsi'];
            $jamaah->kabupaten_kota = $validatedData['kabupaten_kota'];
            $jamaah->kecamatan = $validatedData['kecamatan'];
            $jamaah->kelurahan_desa = $validatedData['kelurahan_desa'];
            $jamaah->jenis_kelamin = $validatedData['jenis_kelamin'];
            $jamaah->no_paspor = $validatedData['no_paspor'];
            $jamaah->masa_berlaku_paspor = $validatedData['masa_berlaku_paspor'];
            $jamaah->no_visa = $validatedData['no_visa'];
            $jamaah->masa_berlaku_visa = $validatedData['masa_berlaku_visa'];
            $jamaah->lampiran_ktp = $lampiranKtpPath;
            $jamaah->lampiran_kk = $lampiranKkPath;
            $jamaah->lampiran_foto_diri = $lampiranFotoDiriPath;
            $jamaah->lampiran_paspor = $lampiranPasporPath;
            $jamaah->paket_dipilih = $validatedData['paket_dipilih'];
            $jamaah->kamar_dipilih = $validatedData['kamar_dipilih'];
    
            $jamaah->save();
    
            return redirect()->route('jamaahs.index')->with('success', 'Data Jamaah Berhasil Disimpan');
        }catch(\Exception $e){
            \Log::error(message: "Error saat menyimpan data: " . $e->getMessage());
            return back()->withErrors('Gagal menyimpan data. Silakan coba lagi.');
        }
    }
}
