<?php

namespace App\Models;

use App\Models\Deposit;
use App\Models\Payment;
use App\Models\Costumer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayInstallment extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];

    protected $table = 'pay_installments';
    protected $fillable = [
        'costumer_id',
        'payment_id',
        'deposit_id',
        'tanggal_pembayaran',
        'angsuran_ke',
        'harga_deal',
        'nominal',
        'sisa_angsuran',
        'petugas',
        'keterangan',
        'catatan'
    ];

    // public function costumer(): BelongsTo
    // {
    //     return $this->belongsTo(Costumer::class);
    // }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function deposit(): BelongsTo
    {
        return $this->belongsTo(Deposit::class);
    }
}
