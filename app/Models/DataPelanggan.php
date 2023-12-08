<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DataPelanggan extends Model
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
        'nilai_bp',
        'foto_survei'
    ];

    public function manager_unit(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_mngr_unit');
    }

    public function manager_ren(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_mngr_ren');
    }

    public function tl_rensis(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_tl_rensis');
    }
    public function tl_teknik(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_tl_teknik');
    }


    public function pasangmaterial(): BelongsToMany
    {
        return $this->belongsToMany(HargaPasang::class, 'pelanggan_pasangs', 'id_pelanggan', 'id_hargapasang')->withPivot(['banyak_material', 'nilai_rab_mdu', 'nilai_rab_jasa', 'ratio'])->withTimestamps();
    }
    public function bongkarmaterial(): BelongsToMany
    {
        return $this->belongsToMany(HargaBongkar::class, 'pelanggan_bongkars', 'id_pelanggan', 'id_hargabongkar')->withPivot(['banyak_material']);
    }
}
