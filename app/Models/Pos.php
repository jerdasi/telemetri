<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pos extends Model
{
    use HasFactory;

    protected $table = "pos";
    protected $fillable = [
        'nama',
        'wilayah_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function wilayah(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class);
    }
}
