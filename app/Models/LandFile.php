<?php

namespace App\Models;

use App\Models\LandCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandFile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function land_certificates(): BelongsTo
    {
        return $this->belongsTo(LandCertificate::class);
    }
}
