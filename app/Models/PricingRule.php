<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingRule extends Model
{
    protected $fillable = [
        'service_area_id',
        'service_id',
        'nombre',
        'base_fee',
        'per_km_fee',
        'night_surcharge',
        'activo',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceArea()
    {
        return $this->belongsTo(ServiceArea::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
