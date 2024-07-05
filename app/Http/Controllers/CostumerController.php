<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Doc;
use App\Models\Land;
use App\Models\Costumer;
use App\Models\Purchase;
use App\Models\CostumerFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pelanggan.index', [
            'title' => 'Aplikasi Pendataan | Pelanggan',
            'costumers' => Costumer::latest()->get(),
            'notifications' => Doc::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pelanggan.add-pelanggan', [
            'title' => 'Aplikasi Pelanggan | Pelanggan Baru',
            'lands' => Land::all(),
            'purchases' => Purchase::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'land_id' => 'required',
            'purchase_id' => 'required',
            'nik' => 'unique:costumers|max:16',
            'umur' => 'required',
            'pekerjaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'saksi_satu' => 'required|max:255',
            'saksi_dua' => 'required|max:255',
            'foto_ktp' => 'image|file|max:1024',
            'no_akad' => 'required|max:255',
            'kantor_pelayanan' => 'required|max:255',
            'blok' => 'required|max:255',
            'kuantitas' => 'required|max:255',
            'harga_jual' => 'required|max:255',
            'potongan' => 'max:255',
            'harga_setelah_pemotongan' => 'required|max:255',
            'tenor' => 'required|max:255',
            'besar_angsuran'  => 'required|max:255',
            'tanggal_jatuh_tempo'  => 'required|date',
            'no_hp_satu'  => 'required|max:255',
            'no_hp_dua'  => 'max:255',
            'agen'  => 'required|max:255',
        ]);

        if ($request->file('foto_ktp')) {
            $fotoKtpName = $validatedData['nik'] . '.' . $request->file('foto_ktp')->extension();
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->storeAs('dokumen/costumer-file/ktp-images', $fotoKtpName);
        }

        $new_costumer = Costumer::create($validatedData);

        $dokumen_akad_satu = $request->file('dokumen_akad_satu');
        $dokumen_akad_dua = $request->file('dokumen_akad_dua');
        $dokumen_akad_tiga = $request->file('dokumen_akad_tiga');
        $foto_akad_satu = $request->file('foto_akad_satu');
        $foto_akad_dua = $request->file('foto_akad_dua');
        $foto_akad_tiga = $request->file('foto_akad_tiga');
        $dokumen_pendukung_satu = $request->file('dokumen_pendukung_satu');
        $dokumen_pendukung_dua = $request->file('dokumen_pendukung_dua');
        $dokumen_pendukung_tiga = $request->file('dokumen_pendukung_tiga');

        if ($dokumen_akad_satu) {
            foreach ($dokumen_akad_satu as $dokumenAkadSatu) {
                $dokumenAkadSatuName = $validatedData['nama'] . '-dokumen_akad_satu-' . time() . rand(1, 1000) . '.' . $dokumenAkadSatu->extension();
                $dokumenAkadSatu->move(public_path('dokumen/costumer-file'), $dokumenAkadSatuName);

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $dokumenAkadSatuName
                ]);
            }
        }

        if ($dokumen_akad_dua) {
            foreach ($dokumen_akad_dua as $dokumenAkadDua) {
                $dokumenAkadDuaName = $validatedData['nama'] . '-dokumen_akad_dua-' . time() . rand(1, 1000) . '.' . $dokumenAkadDua->extension();
                $dokumenAkadDua->move(public_path('dokumen/costumer-file'), $dokumenAkadDuaName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $dokumenAkadDuaName
                ]);
            }
        }

        if ($dokumen_akad_tiga) {
            foreach ($dokumen_akad_tiga as $dokumenAkadTiga) {
                $dokumenAkadTigaName = $validatedData['nama'] . '-dokumen_akad_tiga-' . time() . rand(1, 1000) . '.' . $dokumenAkadTiga->extension();
                $dokumenAkadTiga->move(public_path('dokumen/costumer-file'), $dokumenAkadTigaName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $dokumenAkadTigaName
                ]);
            }
        }

        if ($foto_akad_satu) {
            foreach ($foto_akad_satu as $fotoAkadSatu) {
                $fotoAkadSatuName = $validatedData['nama'] . '-foto_akad_satu-' . time() . rand(1, 1000) . '.' . $fotoAkadSatu->extension();
                $fotoAkadSatu->move(public_path('dokumen/costumer-file'), $fotoAkadSatuName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $fotoAkadSatuName
                ]);
            }
        }

        if ($foto_akad_dua) {
            foreach ($foto_akad_dua as $fotoAkadDua) {
                $fotoAkadDuaName = $validatedData['nama'] . '-foto_akad_dua-' . time() . rand(1, 1000) . '.' . $fotoAkadDua->extension();
                $fotoAkadDua->move(public_path('dokumen/costumer-file'), $fotoAkadDuaName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $fotoAkadDuaName
                ]);
            }
        }

        if ($foto_akad_tiga) {
            foreach ($foto_akad_tiga as $fotoAkadTiga) {
                $fotoAkadTigaName = $validatedData['nama'] . '-foto_akad_tiga-' . time() . rand(1, 1000) . '.' . $fotoAkadTiga->extension();
                $fotoAkadTiga->move(public_path('dokumen/costumer-file'), $fotoAkadTigaName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $fotoAkadTigaName
                ]);
            }
        }

        if ($dokumen_pendukung_satu) {
            foreach ($dokumen_pendukung_satu as $dokumenPendukungSatu) {
                $dokumenPendukungSatuName = $validatedData['nama'] . '-dokumen_pendukung_satu-' . time() . rand(1, 1000) . '.' . $dokumenPendukungSatu->extension();
                $dokumenPendukungSatu->move(public_path('dokumen/costumer-file'), $dokumenPendukungSatuName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $dokumenPendukungSatuName
                ]);
            }
        }

        if ($dokumen_pendukung_dua) {
            foreach ($dokumen_pendukung_dua as $dokumenPendukungDua) {
                $dokumenPendukungDuaName = $validatedData['nama'] . '-dokumen_pendukung_dua-' . time() . rand(1, 1000) . '.' . $dokumenPendukungDua->extension();
                $dokumenPendukungDua->move(public_path('dokumen/costumer-file'), $dokumenPendukungDuaName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $dokumenPendukungDuaName
                ]);
            }
        }

        if ($dokumen_pendukung_tiga) {
            foreach ($dokumen_pendukung_tiga as $dokumenPendukungTiga) {
                $dokumenPendukungTigaName = $validatedData['nama'] . '-dokumen_pendukung_tiga-' . time() . rand(1, 1000) . '.' . $dokumenPendukungTiga->extension();
                $dokumenPendukungTiga->move(public_path('dokumen/costumer-file'), $dokumenPendukungTigaName);
                // $dokumenAkad->storeAs('dokumen/costumer-file/dokumen-akad', $dokumenAkadName);
                // $dokumenAkad->store('dokumen/costumer-file/dokumen-akad');

                CostumerFile::create([
                    'costumer_id' => $new_costumer->id,
                    'dokumen' => $dokumenPendukungTigaName
                ]);
            }
        }

        return redirect('/dashboard/costumers')->with('success', 'Costumer has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Costumer $costumer)
    {
        return view('dashboard.pelanggan.show', [
            'title' => 'Aplikasi Pendataan | Data Pelanggan',
            'costumer' => $costumer,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costumer $costumer)
    {
        return view('dashboard.pelanggan.edit-pelanggan', [
            'title' => 'Aplikasi Pendataan | Data Pelanggan',
            'costumer' => $costumer,
            'lands' => Land::all(),
            'purchases' => Purchase::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costumer $costumer)
    {
        $rules = [
            'nama' => 'required|max:255',
            'land_id' => 'required',
            'purchase_id' => 'required',
            // 'nik' => 'uniqsue:costumers|max:16',
            'umur' => 'required',
            'pekerjaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'saksi_satu' => 'required|max:255',
            'saksi_dua' => 'required|max:255',
            'foto_ktp' => 'image|file|max:1024',
            'no_akad' => 'required|max:255',
            'kantor_pelayanan' => 'required|max:255',
            'blok' => 'required|max:255',
            'kuantitas' => 'required|max:255',
            'harga_jual' => 'required|max:255',
            'potongan' => 'max:255',
            'harga_setelah_pemotongan' => 'required|max:255',
            'tenor' => 'required|max:255',
            'besar_angsuran'  => 'required|max:255',
            'tanggal_jatuh_tempo'  => 'required|date',
            'no_hp_satu'  => 'required|max:255',
            'no_hp_dua'  => 'max:255',
            'agen'  => 'required|max:255',
        ];

        if ($request->nik != $costumer->nik) {
            $rules['nik'] = 'unique:costumers|max:16';
        }

        $validatedData = $request->validate($rules);

        Costumer::where('id', $costumer->id)->update($validatedData);

        return redirect('/dashboard/costumers')->with('success', 'Costumer has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costumer $costumer)
    {

        if ($costumer->foto_ktp) {
            Storage::delete($costumer->foto_ktp);
        }

        $customerFiles = \App\Models\CostumerFile::where('costumer_id', $costumer)->get();
        // dd($customerFiles);
        foreach ($customerFiles as $customerFile) {
            if (Storage::exists($customerFile->path)) {
                Storage::delete($customerFile->path);
                $customerFile->delete();
            }
        }

        $costumer->delete();
        return redirect('/dashboard/costumers')->with('success', 'Costumer has been deleted!');
    }

    public function downloadFile(Costumer $costumer)
    {

        // return Costumer::with('pay_installments')->find($costumer->id);

        // return $costumer->with('pay_installments')->whereHas('pay_installments', function ($query) {
        //     $query->whereYear('created_at', date('Y'));
        // })->get();

        $html = view('dashboard.pelanggan.rekap-pembayaran', [
            'costumer' => Costumer::with('pay_installments')->find($costumer->id)
        ]);

        // $options = new Options();
        // $options->set('chroot', realpath(''));
        // $options->set('isRemoteEnabled', true);
        // $pdf = new Dompdf($options);

        // $pdf->loadHtml('<img src="' . asset('storage/images/logo.png') . '" width="100px" height="100px" style="margin-top: 20px; margin-left: 20px;">');

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        // Set page size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render PDF and output
        $pdf->render();
        return $pdf->stream('rekap-pembayaran-' . $costumer->nama . '.pdf');
    }

    public function downloadLaporanPenjualan()
    {
        // return Costumer::orderBy('land_id', 'asc')->get();
        $html = view('dashboard.pelanggan.laporan-penjualan', [
            'costumers' => Costumer::orderBy('land_id', 'asc')->get()
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-penjualan.pdf');
    }
}
