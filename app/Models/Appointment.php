<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'details',
        'hour_limit',
        'date',
        'time',
        'phone_num',
        'user_id',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
