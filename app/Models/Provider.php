<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_comercial',
        'tipo_proveedor',
        'validado',
        'estatus',
        'service_area_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'provider_services');
    }

    public function schedules()
    {
        return $this->hasMany(ProviderSchedule::class);
    }

    public function locations()
    {
        return $this->hasMany(ProviderLocation::class);
    }

    public function documents()
    {
        return $this->hasMany(ProviderDocument::class);
    }

    public function payouts()
    {
        return $this->hasMany(ProviderPayout::class);
    }
}
