<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Land;
use App\Models\Costumer;
use App\Models\LandFile;
use Illuminate\Http\Request;
use App\Models\LandCertificate;
use App\Http\Controllers\Controller;

class LandCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.penyerahan_surat_lahan.index', [
            'title' => 'Aplikasi Pendataan | Penyerahan Surat Lahan',
            'land_certificates' => LandCertificate::all(),
            'costumers' => Costumer::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.penyerahan_surat_lahan.create', [
            'title' => 'Aplikasi Pendataan | Penyerahan Surat Lahan',
            'costumers' => Costumer::all(),
            'lands' => Land::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'costumer_id' => 'required',
            'land_id' => 'required',
            'blok' => 'required|max:255',
            'kantor_pelayanan' => 'required|max:255',
            'tanggal' => 'required|date',
            'nama_yang_menyerahkan' => 'required|max:255',
            'nama_yang_menerima' => 'required|max:255',
        ]);

        $new_land_certificate = LandCertificate::create($validatedData);

        $surat_kuasa = $request->file('surat_kuasa');
        $surat_tanah = $request->file('surat_tanah');
        $berita_acara_serah_terima_satu = $request->file('berita_acara_serah_terima_satu');
        $berita_acara_serah_terima_dua = $request->file('berita_acara_serah_terima_dua');
        $foto_serah_terima_satu = $request->file('foto_serah_terima_satu');
        $foto_serah_terima_dua = $request->file('foto_serah_terima_dua');
        $foto_serah_terima_tiga = $request->file('foto_serah_terima_tiga');


        if ($surat_kuasa) {
            foreach ($surat_kuasa as $suratKuasa) {
                $suratKuasaName = $validatedData['nama_yang_menerima'] . '-surat_kuasa-' . time() . rand(1, 1000) . '.' . $suratKuasa->extension();
                $suratKuasa->move(public_path('dokumen/penyerahan-surat-lahan'), $suratKuasaName);

                LandFile::create([
                    'landcertificate_id' => $new_land_certificate->id,
                    'dokumen' => $suratKuasaName
                ]);
            }
        }

        if ($surat_tanah) {
            foreach ($surat_tanah as $suratTanah) {
                $suratTanahName = $validatedData['nama_yang_menerima'] . '-surat_tanah-' . time() . rand(1, 1000) . '.' . $suratTanah->extension();
                $suratTanah->move(public_path('dokumen/penyerahan-surat-lahan'), $suratTanahName);

                LandFile::create([
                    'landcertificate_id' => $new_land_certificate->id,
                    'dokumen' => $suratTanahName
                ]);
            }
        }

        if ($berita_acara_serah_terima_satu) {
            foreach ($berita_acara_serah_terima_satu as $beritaAcara) {
                $beritaAcaraName = $validatedData['nama_yang_menerima'] . '-berita_acara_serah_terima_satu-' . time() . rand(1, 1000) . '.' . $beritaAcara->extension();
                $beritaAcara->move(public_path('dokumen/penyerahan-surat-lahan'), $beritaAcaraName);

                LandFile::create([
                    'landcertificate_id' => $new_land_certificate->id,
                    'dokumen' => $beritaAcaraName
                ]);
            }
        }

        if ($berita_acara_serah_terima_dua) {
            foreach ($berita_acara_serah_terima_dua as $beritaAcaraDua) {
                $beritaAcaraDuaName = $validatedData['nama_yang_menerima'] . '-berita_acara_serah_terima_dua-' . time() . rand(1, 1000) . '.' . $beritaAcaraDua->extension();
                $beritaAcaraDua->move(public_path('dokumen/penyerahan-surat-lahan'), $beritaAcaraDuaName);

                LandFile::create([
                    'landcertificate_id' => $new_land_certificate->id,
                    'dokumen' => $beritaAcaraDuaName
                ]);
            }
        }

        if ($foto_serah_terima_satu) {
            foreach ($foto_serah_terima_satu as $fotoSerahTerimaSatu) {
                $fotoSerahTerimaSatuName = $validatedData['nama_yang_menerima'] . '-foto_serah_terima_satu-' . time() . rand(1, 1000) . '.' . $fotoSerahTerimaSatu->extension();
                $fotoSerahTerimaSatu->move(public_path('dokumen/penyerahan-surat-lahan'), $fotoSerahTerimaSatuName);

                LandFile::create([
                    'landcertificate_id' => $new_land_certificate->id,
                    'dokumen' => $fotoSerahTerimaSatuName
                ]);
            }
        }

        if ($foto_serah_terima_dua) {
            foreach ($foto_serah_terima_dua as $fotoSerahTerimaDua) {
                $fotoSerahTerimaDuaName = $validatedData['nama_yang_menerima'] . '-foto_serah_terima_dua-' . time() . rand(1, 1000) . '.' . $fotoSerahTerimaDua->extension();
                $fotoSerahTerimaDua->move(public_path('dokumen/penyerahan-surat-lahan'), $fotoSerahTerimaDuaName);

                LandFile::create([
                    'landcertificate_id' => $new_land_certificate->id,
                    'dokumen' => $fotoSerahTerimaDuaName
                ]);
            }
        }

        if ($foto_serah_terima_tiga) {
            foreach ($foto_serah_terima_tiga as $fotoSerahTerimaTiga) {
                $fotoSerahTerimaTigaName = $validatedData['nama_yang_menerima'] . '-foto_serah_terima_tiga-' . time() . rand(1, 1000) . '.' . $fotoSerahTerimaTiga->extension();
                $fotoSerahTerimaTiga->move(public_path('dokumen/penyerahan-surat-lahan'), $fotoSerahTerimaTigaName);

                LandFile::create([
                    'landcertificate_id' => $new_land_certificate->id,
                    'dokumen' => $fotoSerahTerimaTigaName
                ]);
            }
        }

        return redirect('/dashboard/land_certificates')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(LandCertificate $landCertificate)
    {

        // return LandFile::where('landcertificate_id', $landCertificate)->get();

        return view('dashboard.penyerahan_surat_lahan.show', [
            'title' => 'Aplikasi Pendataan | Penyerahan Surat Lahan',
            'land_certificate' => $landCertificate,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LandCertificate $landCertificate)
    {
        return view('dashboard.penyerahan_surat_lahan.edit', [
            'title' => 'Aplikasi Pendataan | Penyerahan Surat Lahan',
            'land_certificate' => $landCertificate,
            'costumers' => Costumer::all(),
            'lands' => Land::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandCertificate $landCertificate)
    {
        $rules = [
            'costumer_id' => 'required',
            'land_id' => 'required',
            'blok' => 'required|max:255',
            'kantor_pelayanan' => 'required|max:255',
            'tanggal' => 'required|date',
            'nama_yang_menyerahkan' => 'required|max:255',
            'nama_yang_menerima' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        LandCertificate::where('id', $landCertificate->id)->update($validatedData);

        return redirect('/dashboard/land_certificates')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandCertificate $landCertificate)
    {
        $landCertificate->delete();

        return redirect('/dashboard/land_certificates')->with('success', 'Data has been deleted');
    }
}
