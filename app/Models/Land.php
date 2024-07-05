<?php

namespace App\Models;

use App\Models\Cancel;
use App\Models\Costumer;
use App\Models\LandCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Land extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function costumer(): HasMany
    {
        return $this->hasMany(Costumer::class);
    }

    public function land_certificates(): HasMany
    {
        return $this->hasMany(LandCertificate::class);
    }

    public function cancels(): HasMany
    {
        return $this->hasMany(Cancel::class);
    }
}
