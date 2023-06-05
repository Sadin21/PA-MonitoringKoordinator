<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academic_report extends Model
{
    use HasFactory;
    protected $fillable = ([
        'maxScore',
        'minScore',
        'meanScore',
        'status',
        'file',
        'child_id',
    ]);

    public function children()
    {
        return $this->belongsTo(Children::class);
    }
}
