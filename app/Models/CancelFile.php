<?php

namespace App\Models;

use App\Models\Cancel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CancelFile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cancel(): BelongsTo
    {
        return $this->belongsTo(Cancel::class);
    }
}
