<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KartuKeluarga extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_kk',
    ];

    /**
     * Get all of the comments for the KartuKeluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data_keluarga(): HasMany
    {
        return $this->hasMany(DataKeluarga::class);
    }
}
