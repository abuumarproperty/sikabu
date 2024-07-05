<?php

namespace App\Http\Controllers;

use App\Exports\ExportAlmadinah1;
use App\Exports\ExportAlmadinah2;
use App\Exports\ExportAlmadinah3;
use App\Models\Doc;
use App\Models\Land;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Costumer;
use App\Models\PayInstallment;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Auth\Access\Gate;
use Maatwebsite\Excel\Facades\Excel;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 1');
        // })->with('land')->get();

        return view('dashboard.lahan.index', [
            'title' => 'Aplikasi Pendataan | Lahan',
            'lands' => Land::latest()->get(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.lahan.add-lahan', [
            'title' => 'Aplikasi Pendataan | Tambah Lahan',
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
            'keterangan' => 'max:255'
        ]);

        Land::create($validatedData);

        return redirect('dashboard/lands')->with('success', 'Added new Land');
    }

    /**
     * Display the specified resource.
     */
    public function show(Land $land)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Land $land)
    {
        return view('dashboard.lahan.edit-lahan', [
            'title' => 'Aplikasi Pendataan | Edit Lahan',
            'land' => $land,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Land $land)
    {
        $rules = [
            'nama' => 'required|max:255',
            'keterangan' => 'max:255'
        ];

        $validatedData = $request->validate($rules);

        Land::where('id', $land->id)->update($validatedData);

        return redirect('dashboard/lands')->with('success', 'Edited Land');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Land $land)
    {
        $land->delete();

        return redirect('/dashboard/lands')->with('success', 'Deleted Land');
    }

    // Method di bawah untuk export ke excel, tapi belum di perlukan

    /** 
     * public function exportLahanAlmadinah1()
     * {
     *  return Excel::download(new ExportAlmadinah1, 'laporan-almadinah1.xlsx');
     *}

     * public function exportLahanAlmadinah2()
     *{
     *   return Excel::download(new ExportAlmadinah2, 'laporan-almadinah2.xlsx');
     *}

     *public function exportLahanAlmadinah3()
     *{
     *   return Excel::download(new ExportAlmadinah3, 'laporan-almadinah3.xlsx');
     *}

     **/

    public function exportLahanAlmadinah1()
    {

        // return Costumer::whereHas('pay_installments', function ($query) {
        //     $query->where('sisa_angsuran', '>', 0);
        // })->whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 1');
        // })->get();

        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 1');
        // })->whereHas('pay_installments', function ($query) {
        //     $query->where('sisa_angsuran', '>', 0);
        // })->get();

        // $data = PayInstallment::whereHas('costumer', function ($query) {
        //     $query->whereHas('land', function ($query) {
        //         $query->where('nama', 'Al-Madinah 1');
        //     });
        // })->whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();

        $data = Costumer::whereHas('land', function ($query) {
            $query->where('nama', 'Al - Madinah 1');
        })->whereHas('pay_installments', function ($query) {
            $query->where('sisa_angsuran', '>', 0);
        })->get();

        $html = view('dashboard.lahan.laporan-bulanan-al-madinah-1', [
            'all_data' => $data,
            'costumers' => Costumer::all()
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-penjualan-lahan-al-madinah-1-bulan-' . Carbon::now()->month . '.pdf');
    }

    public function exportLahanAlmadinah2()
    {

        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 2');
        // })->get();

        // $data = PayInstallment::whereHas('costumer', function ($query) {
        //     $query->whereHas('land', function ($query) {
        //         $query->where('nama', 'Al-Madinah 2');
        //     });
        // })->whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();

        $data = Costumer::whereHas('land', function ($query) {
            $query->where('nama', 'Al - Madinah 2');
        })->whereHas('pay_installments', function ($query) {
            $query->where('sisa_angsuran', '>', 0);
        })->get();

        $html = view('dashboard.lahan.laporan-bulanan-al-madinah-2', [
            'all_data' => $data,
            'costumers' => Costumer::all()
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-penjualan-lahan-al-madinah-2-bulan-' . Carbon::now()->month . '.pdf');
    }

    public function exportLahanAlmadinah3()
    {
        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 3');
        // })->get();

        // $data = PayInstallment::whereHas('costumer', function ($query) {
        //     $query->whereHas('land', function ($query) {
        //         $query->where('nama', 'Al-Madinah 3');
        //     });
        // })->whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();

        $data = Costumer::whereHas('land', function ($query) {
            $query->where('nama', 'Al - Madinah 3');
        })->whereHas('pay_installments', function ($query) {
            $query->where('sisa_angsuran', '>', 0);
        })->get();

        $html = view('dashboard.lahan.laporan-bulanan-al-madinah-3', [
            'all_data' => $data,
            'costumers' => Costumer::all()
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-penjualan-lahan-al-madinah-3-bulan-' . Carbon::now()->month . '.pdf');
    }
}
