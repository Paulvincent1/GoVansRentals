<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'address',
        'contact_number',
        'note',
        'day',
        'status',
        'user_id',
        'van_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function van(){
        return $this->belongsTo(Van::class);
    }
}
