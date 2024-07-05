<?php

namespace App\Models;

use App\Models\PayInstallment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pay_installments(): HasMany
    {
        return $this->hasMany(PayInstallment::class);
    }
}
