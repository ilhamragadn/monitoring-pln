<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HargaBongkar extends Model
{
    use HasFactory;

    protected $fillable = [
        'material',
        'satuan',
        'rp_mdu',
        'rp_non_mdu_dan_jasa',
        'rp_jasa',
        'rp_total',
        'klasifikasi'
    ];

    // public function permohonan(): HasMany
    // {
    //     return $this->hasMany(DataPermohonan::class);
    // }
    public function pelanggan(): BelongsToMany
    {
        return $this->belongsToMany(DataPelanggan::class);
    }
}
