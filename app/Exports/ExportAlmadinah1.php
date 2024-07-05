<?php

namespace App\Exports;

use App\Models\Costumer;
use App\Models\PayInstallment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAlmadinah1 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 1');
        // })->with('land')->get();

        // PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->get()

        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 1');
        // })->whereHas('pay_installments', function ($query) {
        //     $query->whereMonth('tanggal_pembayaran', Carbon::now()->month);
        // })->with('land', 'pay_installments')->get();

        return PayInstallment::whereHas('costumer', function ($query) {
            $query->whereHas('land', function ($query) {
                $query->where('nama', 'Al-Madinah 1');
            });
        })->whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();
    }
}
