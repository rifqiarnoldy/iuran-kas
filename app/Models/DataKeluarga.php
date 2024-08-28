<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKeluarga extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kartu_keluarga_id',
        'penduduk_id',
        'status_hubungan_dalam_keluarga',
    ];

    /**
     * Get the kartu_keluarga that owns the DataKeluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kartu_keluarga(): BelongsTo
    {
        return $this->belongsTo(KartuKeluarga::class);
    }

    /**
     * Get the penduduk that owns the DataKeluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
