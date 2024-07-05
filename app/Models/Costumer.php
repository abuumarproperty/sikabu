<?php

namespace App\Models;

use App\Models\Land;
use App\Models\Cancel;
use App\Models\Purchase;
use App\Models\CostumerFile;
use App\Models\LandCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Costumer extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $table = 'costumers';

    protected $fillable = [
        'nama',
        'land_id',
        'purchase_id',
        'nik',
        'umur',
        'pekerjaan',
        'alamat',
        'saksi_satu',
        'saksi_dua',
        'foto_ktp',
        'no_akad',
        'kantor_pelayanan',
        'blok',
        'kuantitas',
        'harga_jual',
        'potongan',
        'harga_setelah_pemotongan',
        'tenor',
        'besar_angsuran',
        'tanggal_jatuh_tempo',
        'no_hp_satu',
        'no_hp_dua',
        'agen',
    ];

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class);
    }

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }

    public function costumer_files(): HasMany
    {
        return $this->hasMany(CostumerFile::class);
    }

    public function land_certificates(): HasMany
    {
        return $this->hasMany(LandCertificate::class);
    }

    public function cancels(): HasMany
    {
        return $this->hasMany(Cancel::class);
    }

    public function pay_installments(): HasMany
    {
        return $this->hasMany(PayInstallment::class);
    }

    public function getSisaTunggakan()
    {
        $totalHarga = $this->harga_setelah_pemotongan;
        $totalBayar = $this->pay_installments->nominal;
        $sisaTunggakan = $totalHarga - $totalBayar;

        return $sisaTunggakan;
    }
}
