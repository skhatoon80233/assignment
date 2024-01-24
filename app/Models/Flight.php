<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['origin',
    'destination',
    'flight_number',
    'depature',
    'arrival',
    'seats',
    'price',
    'name'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class,'flight_id');
    }

}