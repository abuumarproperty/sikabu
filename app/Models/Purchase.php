<?php

namespace App\Models;

use App\Models\Costumer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function costumer(): HasMany
    {
        return $this->hasMany(Costumer::class);
    }
}
