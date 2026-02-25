<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'estado',
        'pais',
        'activo',
    ];

    public function providers()
    {
        return $this->hasMany(Provider::class);
    }

    public function polygons()
    {
        return $this->hasMany(AreaPolygon::class);
    }

    public function pricingRules()
    {
        return $this->hasMany(PricingRule::class);
    }

    public function assistanceRequests()
    {
        return $this->hasMany(AssistanceRequest::class);
    }
}
