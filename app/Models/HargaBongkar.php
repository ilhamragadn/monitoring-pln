<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
