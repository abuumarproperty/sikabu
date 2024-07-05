<?php

namespace App\Exports;

use App\Models\Costumer;
use App\Models\PayInstallment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAlmadinah3 implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Costumer::whereHas('land', function ($query) {
        //     $query->where('nama', 'Al-Madinah 3');
        // })->with('land')->get();

        return PayInstallment::whereHas('costumer', function ($query) {
            $query->whereHas('land', function ($query) {
                $query->where('nama', 'Al-Madinah 3');
            });
        })->whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();
    }
}
