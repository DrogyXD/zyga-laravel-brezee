<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'activo'];

    public function pricingRules()
    {
        return $this->hasMany(PricingRule::class);
    }
}
