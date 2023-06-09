<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'photo',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
