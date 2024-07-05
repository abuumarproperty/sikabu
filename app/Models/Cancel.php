<?php

namespace App\Models;

use App\Models\Land;
use App\Models\Costumer;
use App\Models\CancelFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cancel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function costumer(): BelongsTo
    {
        return $this->belongsTo(Costumer::class);
    }

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class);
    }

    public function cancelFiles(): HasMany
    {
        return $this->hasMany(CancelFile::class);
    }
}
