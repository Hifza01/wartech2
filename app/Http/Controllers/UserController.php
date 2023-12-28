<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Connection to firebase database
     */
    public function connect() {
        $firebase = (new Factory)
                    ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
                    ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));
                    
        return $firebase->createDatabase();
    }

    public function store(Request $request) {
        $this->connect()->getReference('surat')->push($request->except(['_token']));
        return redirect()->route('surat');
    }

    public function laporan() {
       $users = $this->connect()->getReference('surat')->getSnapshot()->getValue();
    
        $surat = [];
        foreach ($users as $userId => $user) {
            foreach ($user as $key => $item) {
                if (!is_array($item) || !isset($item['jenisSurat']) || $item['jenisSurat'] != 'Pelaporan') {
                    continue;
                }
    
                $surat[] = [
                    'key' => $userId . '/' . $key,
                    'jenisSurat' => $item['jenisSurat'] ?? null,
                    'createdAt' => $item['createdAt'] ?? null,
                    'statusSurat' => $item['statusSurat'] ?? null,
                    'nama' => $item['nama'] ?? null,
                    'nik' => $item['nik'] ?? null,
                    'noHP' => $item['noHP'] ?? null,
                    'laporan' => $item['laporan'] ?? null,
                    'imageUrl' => $item['imageUrl'] ?? null,
                ];
            }
        }
    
        return view('laporan')->with([
            'surat' => $surat
        ]);
    }    

    public function surat_domisili() {
        $users = $this->connect()->getReference('surat')->getSnapshot()->getValue();
    
        $surat = [];
        foreach ($users as $userId => $user) {
            foreach ($user as $key => $item) {
                if (!is_array($item) || !isset($item['jenisSurat']) || $item['jenisSurat'] != 'Surat Domisili Warga') {
                    continue;
                }
    
                $surat[] = [
                    'key' => $userId . '/' . $key,
                    'jenisSurat' => $item['jenisSurat'] ?? null,
                    'createdAt' => $item['createdAt'] ?? null,
                    'statusSurat' => $item['statusSurat'] ?? null,
                    'nama' => $item['nama'] ?? null,
                    'tempatTanggalLahir' => $item['tempatTanggalLahir'] ?? null,
                    'nik' => $item['nik'] ?? null,
                    'pekerjaan' => $item['pekerjaan'] ?? null,
                    'agama' => $item['agama'] ?? null,
                    'statusPerkawinan' => $item['statusPerkawinan'] ?? null,
                    'kewarganegaraan' => $item['kewarganegaraan'] ?? null,
                    'alamatAsal' => $item['alamatAsal'] ?? null,
                    'alamatSekarang' => $item['alamatSekarang'] ?? null,
                ];
            }
        }
    
        return view('surat_domisili')->with([
            'surat' => $surat
        ]);
    }

    public function surat_keterangan_nikah() {
        $users = $this->connect()->getReference('surat')->getSnapshot()->getValue();
    
        $surat = [];
        foreach ($users as $userId => $user) {
            foreach ($user as $key => $item) {
                if (!is_array($item) || !isset($item['jenisSurat']) || $item['jenisSurat'] != 'Surat Pengantar Nikah') {
                    continue;
                }
    
                $surat[] = [
                    'key' => $userId . '/' . $key,
                    'namaLengkapAnda' => $item['namaLengkapAnda'] ?? null,
                    'tempatTanggalLahirAnda' => $item['tempatTanggalLahirAnda'] ?? null,
                    'jenisKelamin' => $item['jenisKelamin'] ?? null,
                    'pekerjaanAnda' => $item['pekerjaanAnda'] ?? null,
                    'agama' => $item['agama'] ?? null,
                    'statusAnda' => $item['statusAnda'] ?? null,
                    'namaLengkapAyah' => $item['namaLengkapAyah'] ?? null,
                    'tempatTanggalLahirAyah' => $item['tempatTanggalLahirAyah'] ?? null,
                    'agamaAyah' => $item['agamaAyah'] ?? null,
                    'statusSurat' => $item['statusSurat'] ?? null,
                    'createdAt' => $item['createdAt'] ?? null,
                    'jenisSurat' => $item['jenisSurat'] ?? null,
                ];
            }
        }
    
        return view('surat_keterangan_nikah')->with([
            'surat' => $surat
        ]);
    }

    public function surat_kematian() {
        $users = $this->connect()->getReference('surat')->getSnapshot()->getValue();
    
        $surat = [];
        foreach ($users as $userId => $user) {
            foreach ($user as $key => $item) {
                if (!is_array($item) || !isset($item['jenisSurat']) || $item['jenisSurat'] != 'Surat Kematian Warga') {
                    continue;
                }
    
                $surat[] = [
                    'key' => $userId . '/' . $key,
                    'namaLengkap' => $item['namaLengkap'] ?? null,
                    'hubungan' => $item['hubungan'] ?? null,
                    'namaLengkapMeninggal' => $item['namaLengkapMeninggal'] ?? null,
                    'tempatTanggalLahir' => $item['tempatTanggalLahir'] ?? null,
                    'jenisKelamin' => $item['jenisKelamin'] ?? null,
                    'agama' => $item['agama'] ?? null,
                    'jenisKelaminMeninggal' => $item['jenisKelaminMeninggal'] ?? null,
                    'agamaMeninggal' => $item['agamaMeninggal'] ?? null,
                    'noKKNIK' => $item['noKKNIK'] ?? null,
                    'kewarganegaraan' => $item['kewarganegaraan'] ?? null,
                    'alamatWargaMeninggal' => $item['alamatWargaMeninggal'] ?? null,
                    'waktuMeninggal' => $item['waktuMeninggal'] ?? null,
                    'tanggalMeninggal' => $item['tanggalMeninggal'] ?? null,
                    'tempatMeninggal' => $item['tempatMeninggal'] ?? null,
                    'penyebabMeninggal' => $item['penyebabMeninggal'] ?? null,
                    'statusSurat' => $item['statusSurat'] ?? null,
                    'createdAt' => $item['createdAt'] ?? null,
                    'jenisSurat' => $item['jenisSurat'] ?? null,
                ];
            }
        }
    
        return view('surat_kematian')->with([
            'surat' => $surat
        ]);
    }

    public function updateSuratDomisili(Request $request, $key) {
        $statusSurat = $request->input('status') == '1' ? 'Terima' : 'Tolak';
        $this->connect()->getReference('surat/' . $key)->update([
            'statusSurat' => $statusSurat
        ]);

        return redirect()->back();
    }   

    public function destroy($id) {
        $firebase = $this->connect();
        $documentRef = $firebase->getReference('surat/' . $id);
        $documentRef->remove();

        return back();
    }
}
