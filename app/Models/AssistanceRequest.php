<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssistanceRequest extends Model
{
    use HasFactory;

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
    'estatus',
    'cancel_reason',
    'cancelled_by',
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function area()
    {
        return $this->belongsTo(ServiceArea::class, 'service_area_id');
    }

    public function quote()
    {
        return $this->hasOne(Quote::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function statusLogs()
    {
        return $this->hasMany(RequestStatusLog::class);
    }
}
