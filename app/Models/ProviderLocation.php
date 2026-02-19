<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderLocation extends Model
{
    protected $fillable = [
        'provider_id',
        'latitud',
        'longitud',
        'recorded_at',
    ];

    protected $casts = [
        'recorded_at' => 'datetime',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
