<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganBongkar extends Model
{
    use HasFactory;

    protected $table = 'pelanggan_bongkars';
    protected $fillable = [
        'nama_material',
        'banyak_material',
        'nilai_rab_mdu',
        'nilai_rab_jasa',
        'ratio',
        'id_pelanggan',
        'id_hargabongkar'
    ];
}
