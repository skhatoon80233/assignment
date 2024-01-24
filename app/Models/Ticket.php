<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_id','ticket_number','passenger_name','boarding_gate','class','seat','boarding_time','status'
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class,'flight_id');
    }
    
}