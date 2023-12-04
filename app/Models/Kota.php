<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kota extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function curah_hujan(): BelongsTo
    {
        return $this->belongsTo(CurahHujan::class);
    }
}
