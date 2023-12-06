<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PelangganPasang extends Pivot
{
    use HasFactory;
    protected $table = 'pelanggan_pasangs';

    protected $fillable = [
        'banyak_material',
        'nilai_rab_mdu',
        'nilai_rab_jasa',
        'ratio',
        'id_pelanggan',
        'id_hargapasang'
    ];

    // public function pelanggan(): BelongsTo
    // {
    //     return $this->belongsTo(DataPelanggan::class);
    // }

    // public function pasangmaterial(): BelongsToMany
    // {
    //     return $this->belongsToMany(HargaPasang::class, 'pelanggan_pasangs', 'id_pelanggan', 'id_hargapasang');
    // }
}
