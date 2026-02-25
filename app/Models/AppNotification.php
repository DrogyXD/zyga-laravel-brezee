<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppNotification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'titulo',
        'mensaje',
        'leida',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
