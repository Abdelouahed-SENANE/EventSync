<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'event_id',
        'status'
    ];
    public function event() {
        return $this->belongsTo(Event::class , 'event_id');
    }
    public function user() {
        return $this->belongsTo(User::class , 'client_id');
    }
}
