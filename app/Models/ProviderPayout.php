<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderPayout extends Model
{
    protected $fillable = [
        'provider_id',
        'assistance_request_id',
        'monto',
        'estado',
        'payout_reference',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function assistanceRequest()
    {
        return $this->belongsTo(AssistanceRequest::class);
    }
}
