<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Deposit;
use App\Models\Payment;
use App\Models\Costumer;
use Illuminate\Http\Request;
use App\Models\PayInstallment;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Config;
use Riskihajar\Terbilang\Facades\Terbilang;
use Rmunate\Utilities\SpellNumber;

class PayInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Costumer::with('pay_installments')->get();

            return view('dashboard.bayar_angsuran.index', [
                'title' => 'Aplikasi Pendataan | Data Angsuran',
                'pay_installments' => PayInstallment::latest()->get(),
                'costumers' => $data,
                'notifications' => \App\Models\Doc::latest()->get()
            ]);
        } catch (Exception $e) {
            // return $th;
            // return redirect('/dashboard/pay_installments')->with('error', 'Something went wrong');
            return view('dashboard.404', [], 500);
        }
        // $data = Costumer::with('pay_installments')->get();
        // return $data->pay_installments;

        // return view('dashboard.bayar_angsuran.index', [
        //     'title' => 'Aplikasi Pendataan | Data Angsuran',
        //     'pay_installments' => PayInstallment::latest()->get(),
        //     // 'pay_installments' => Costumer::whereHas('pay_installments')->with('pay_installments')->get(),
        //     'costumers' => $data,
        //     'notifications' => \App\Models\Doc::latest()->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.bayar_angsuran.create', [
            'title' => 'Aplikasi Pendataan | Bayar Angsuran',
            'costumers' => Costumer::all(),
            'payments' => Payment::all(),
            'deposits' => Deposit::all(),
            'notifications' => \App\Models\Doc::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'costumer_id' => 'required',
            'tanggal_pembayaran' => 'required|date',
            'deposit_id' => 'required',
            'angsuran_ke' => 'required',
            'payment_id' => 'required',
            'harga_deal' => 'required',
            'nominal' => 'required',
            'sisa_angsuran' => 'required',
            'petugas' => 'required|max:255',
            'keterangan' => 'max:255',
            'catatan' => 'max:255',
        ]);

        $payInstallment = PayInstallment::create($validated);

        // Convert Number to Word
        Config::set('terbilang.locale', 'id');
        $data = Terbilang::make($payInstallment->nominal);

        $html = view('dashboard.bayar_angsuran.costumer-pdf', [
            'data' => $payInstallment,
            'terbilang' => $data
        ]);

        $dompdf = new Dompdf();

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        // $dompdf->setPaper('A3', 'landscape');
        $dompdf->setPaper('A5', 'landscape');

        // Render HTML to PDF
        $dompdf->render();

        // Save PDF to disk
        $dompdf->stream('dokumen/pembayaran/customer-' . $payInstallment->costumer->nama . '.pdf');

        // Output PDF
        $output = $dompdf->output();


        // Save PDF to file (optional)
        file_put_contents('dokumen/pembayaran/customer-' . $payInstallment->costumer->nama . '.pdf', $output);

        // Redirect to PDF file (optional)

        // return response(404, 'application/pdf')->header('Content-Disposition', 'inline; filename="customer-' . $angsuran->costumer->nama . '.pdf"');

        return redirect('/dashboard/pay_installments')->with('success', 'Added new Pay Installment');
    }

    /**
     * Display the specified resource.
     */
    public function show(PayInstallment $payInstallment)
    {
        return view('dashboard.bayar_angsuran.show', [
            'title' => 'Aplikasi Pendataan | Detail Angsuran',
            'pay_installment' => $payInstallment,
            'notifications' => \App\Models\Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayInstallment $payInstallment)
    {
        return view('dashboard.bayar_angsuran.edit', [
            'title' => 'Aplikasi Pendataan | Edit Angsuran',
            'pay_installment' => $payInstallment,
            'costumers' => Costumer::all(),
            'payments' => Payment::all(),
            'deposits' => Deposit::all(),
            'notifications' => \App\Models\Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PayInstallment $payInstallment)
    {
        $rules = [
            'costumer_id' => 'required',
            'tanggal_pembayaran' => 'required|date',
            'deposit_id' => 'required',
            'angsuran_ke' => 'required',
            'payment_id' => 'required',
            'harga_deal' => 'required',
            'nominal' => 'required',
            'sisa_angsuran' => 'required',
            'petugas' => 'required|max:255',
            'keterangan' => 'max:255',
            'catatan' => 'max:255'
        ];

        $validatedData = $request->validate($rules);

        PayInstallment::where('id', $payInstallment->id)->update($validatedData);

        return redirect('/dashboard/pay_installments')->with('success', 'Updated Pay Installment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayInstallment $payInstallment)
    {
        $payInstallment->delete();

        return redirect('/dashboard/pay_installments')->with('success', 'Deleted Pay Installment');
    }

    public function downloadLaporanBulananPekanbaru()
    {
        // return PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();
        // return PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->whereHas('costumer', function ($query) {
        //     $query->where('kantor_pelayanan', 'Dumai');
        // })->get();

        $html = view('dashboard.bayar_angsuran.laporan-angsuran-bulanan', [
            'all_data' => PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->whereYear('tanggal_pembayaran', Carbon::now()->year)->whereHas('costumer', function ($query) {
                $query->where('kantor_pelayanan', 'Pekanbaru');
            })->get(),
            'costumers' => Costumer::where('kantor_pelayanan', 'Pekanbaru'),
            'kantor_pelayanan' => 'PEKANBARU',
            'alamat' => 'Jl. Melati Indah, Komplek Ruko Jasmine City Garden No. 11, Kel. Tobek Gadang, Kec. Bina Widya - Kota Pekanbaru'
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-angsuran-bulanan-kantor-pelayanan-pekanbaru.pdf');
    }

    public function downloadLaporanBulananDumai()
    {

        $html = view('dashboard.bayar_angsuran.laporan-angsuran-bulanan', [
            'all_data' => PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->whereYear('tanggal_pembayaran', Carbon::now()->year)->whereHas('costumer', function ($query) {
                $query->where('kantor_pelayanan', 'Dumai');
            })->get(),
            'costumers' => Costumer::where('kantor_pelayanan', 'Dumai'),
            'kantor_pelayanan' => 'DUMAI',
            'alamat' => 'Jl. Soekarno-Hatta Sp. Panam, Kel. Bukit Kapur, Kec. Bukit Kapur, Kota Dumai'
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-angsuran-bulanan-kantor-pelayanan-dumai.pdf');
    }

    public function downloadLaporanBulananRohul()
    {
        $html = view('dashboard.bayar_angsuran.laporan-angsuran-bulanan', [
            'all_data' => PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->whereYear('tanggal_pembayaran', Carbon::now()->year)->whereHas('costumer', function ($query) {
                $query->where('kantor_pelayanan', 'Rohul');
            })->get(),
            'costumers' => Costumer::where('kantor_pelayanan', 'Rohul'),
            'kantor_pelayanan' => 'ROHUL',
            'alamat' => 'Jl. Syekh Ismail, Simpang Tangun Desa Pematang Berangan, Kec. Rambah, Kab. Rokan Hulu'
        ]);

        $pdf = new Dompdf();

        $pdf->loadHtml($html);

        $pdf->setPaper('folio', 'landscape');

        $pdf->render();

        return $pdf->stream('laporan-angsuran-bulanan-kantor-pelayanan-rohul.pdf');
    }

    public function downloadAngsuran(PayInstallment $payInstallment)
    {
        // return $payInstallment;

        // Convert Number to Word
        Config::set('terbilang.locale', 'id');
        $data = Terbilang::make($payInstallment->nominal);

        $html = view('dashboard.bayar_angsuran.costumer-pdf', [
            'data' => $payInstallment,
            'terbilang' => $data
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // $dompdf->setPaper('A3', 'landscape');
        $dompdf->setPaper('A5', 'landscape');
        $dompdf->render();
        $dompdf->stream('dokumen/pembayaran/customer-' . $payInstallment->costumer->nama . '.pdf');

        // return redirect('/dashboard/pay_installments')->with('success', 'Added new Pay Installment');
    }
}
