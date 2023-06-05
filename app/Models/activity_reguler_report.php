<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_reguler_report extends Model
{
    use HasFactory;
    protected $fillable = ([
        'five_time_pray',
        'pray_in_mosque',
        'pray_ontime',
        'pray_rawatib',
        'pray_tahiyatul',
        'pray_tahajud',
        'pray_dhuha',
        'pray_fajr',
        'pray_hajad',
        'read_quran',
        'memorize_quran',
        'amount_memorize_quran',
        'fast_sunnah',
        'infaq_sedekah',
        'help_parent',
        'self_study',
        'team_study',
        'help_friend',
        'pray_quran_with_ustadz',
        'description',
        'status',
        'child_id',
    ]);

    public function children()
    {
        return $this->belongsTo(Children::class);
    }
}
