<?php

namespace App\Exports;

use App\Models\PayInstallment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportArrearYear implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PayInstallment::whereYear('tanggal_pembayaran', Carbon::now()->year)->get();
    }
}
