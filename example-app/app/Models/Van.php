<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'seat_capacity',
        'location',
        'rate_per_day',
        'description',
        'img',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
