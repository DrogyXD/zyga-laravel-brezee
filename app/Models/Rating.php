<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'assistance_request_id',
        'user_id',
        'score',
        'comentario',
    ];

    public function assistanceRequest()
    {
        return $this->belongsTo(AssistanceRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
