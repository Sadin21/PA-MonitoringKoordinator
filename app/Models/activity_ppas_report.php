<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_ppas_report extends Model
{
    use HasFactory;
    protected $fillable = ([
        'surah_name',
        'amount_ayah',
        'description',
        'youtube_link',
        'status',
        'child_id',
    ]);
    
    public function children()
    {
        return $this->belongsTo(Children::class);
    }
}
