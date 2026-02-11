<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssistanceRequest extends Model
{
    protected $fillable = [
        'folio',
        'user_id',
        'provider_id',
        'service_id',
        'vehicle_id',
        'service_area_id',
        'latitud',
        'longitud',
        'direccion_referencia',
        'estatus'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
