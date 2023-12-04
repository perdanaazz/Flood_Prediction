<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CurahHujan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kota(): HasOne
    {
        return $this->hasOne(Kota::class, 'id', 'id_kota');
    }
    
    public function situasi(): HasOne
    {
        return $this->hasOne(Situasi::class, 'id', 'id_situasi');
    }
}
