<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KonfigurasiWaktu extends Model
{
    use HasFactory;

    protected $table = "konfigurasi_waktu";
    protected $fillable = [
        'nama'
    ];

    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class);
    }
}
