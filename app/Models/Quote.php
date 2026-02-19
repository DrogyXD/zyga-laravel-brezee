<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'assistance_request_id',
        'moneda',
        'subtotal',
        'comision_plataforma',
        'total',
        'pricing_rule_id',
    ];

    public function assistanceRequest()
    {
        return $this->belongsTo(AssistanceRequest::class);
    }

    public function pricingRule()
    {
        return $this->belongsTo(PricingRule::class);
    }
}
