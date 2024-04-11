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
        'rate_per_day',
        'description',
        'img',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function isAvailable()
    {
        return !$this->books()->where('status', 'accepted')->exists();
    }
}
