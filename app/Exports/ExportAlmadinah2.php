<?php

namespace App\Exports;

use App\Models\Costumer;
use App\Models\PayInstallment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAlmadinah2 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 2');
        // })->with('land')->get();

        return PayInstallment::whereHas('costumer', function ($query) {
            $query->whereHas('land', function ($query) {
                $query->where('nama', 'Al-Madinah 2');
            });
        })->whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();
    }
}
