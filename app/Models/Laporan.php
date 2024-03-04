<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;

    protected $table = "laporan";
    protected $fillable = [
        'tanggal',
        'user_id',
        'pos_id',
        'waktu_id',
        'curah_hujan',
        'tinggi_muka_air',
        'klimatologi',
        'kualitas_air'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pos(): BelongsTo
    {
        return $this->belongsTo(Pos::class, 'pos_id');
    }

    public function konfigurasi_waktu(): BelongsTo
    {
        return $this->belongsTo(KonfigurasiWaktu::class, 'waktu_id');
    }
}
