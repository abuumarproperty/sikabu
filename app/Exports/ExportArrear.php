<?php

namespace App\Exports;

use App\Models\PayInstallment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportArrear implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();
    }
}
