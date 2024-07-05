<?php

namespace App\Http\Controllers;

use App\Exports\ExportArrear;
use App\Exports\ExportArrearYear;
use Illuminate\Http\Request;
use App\Models\PayInstallment;
use App\Http\Controllers\Controller;
use App\Models\Costumer;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;

class ArrearController extends Controller
{

    // Di matikan karena ini export ke excel, belum dipakai

    /** 
     * public function exportTunggakanPerbulan(Request $request)
     * {
     *     return Excel::download(new ExportArrear, 'rekap-tunggakan-perbulan.xlsx');
     * // return Excel::download(new ExportArrear, 'rekap-tunggakan.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
     * }

     * public function exportTunggakanPertahun(Request $request)
     * {
     *  return Excel::download(new ExportArrearYear, 'rekap-tunggakan-pertahun.xlsx');
     * }

     **/

    public function exportTunggakanPerbulan()
    {

        // return PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->where('sisa_angsuran', '>', 0)->get();

        // Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 1');
        // })->whereHas('pay_installments', function ($query) {
        //     $query->where('sisa_angsuran', '>', 0);
        // })->get();

        $html = view('dashboard.rekap-tunggakan.laporan-bulanan-rekap-tunggakan', [
            // 'all_data' => PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->where('sisa_angsuran', '>', 0)->where('tanggal_pembayaran', '>=', Carbon::now()->subDays(60))->get(),
            'all_data' => PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->where('sisa_angsuran', '>', 0)->get(),
            'costumers' => Costumer::all()
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-rekap-tunggakan bulan ' . Carbon::now()->month . '.pdf');
    }

    public function exportTunggakanPertahun()
    {

        // return PayInstallment::whereYear('tanggal_pembayaran', Carbon::now()->year)->where('sisa_angsuran', '>', 0)->with(['costumer' => function ($query) {
        //     $query->latest();
        // }])->latest('costumer_id')->get();

        $html = view('dashboard.rekap-tunggakan.laporan-tahunan-rekap-tunggakan', [
            'all_data' => PayInstallment::whereYear('tanggal_pembayaran', Carbon::now()->year)->where('sisa_angsuran', '>', 0)->latest('tanggal_pembayaran')->get(),
            'costumers' => Costumer::all()
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-rekap-tunggakan-tahun ' . Carbon::now()->year . '.pdf');
    }
}
