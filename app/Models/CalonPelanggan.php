<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'alamat_pelanggan',
        'jumlah_pelanggan',
        'jenis_permohonan',
        'ulp',
        'tarif_lama',
        'tarif_baru',
        'daya_lama',
        'daya_baru',
        'delta',
        'nilai_bp'
    ];
}
