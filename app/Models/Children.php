<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $table = 'children';
    protected $fillable = [
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'status_in_family',
        'grade',
        'class',
        'school',
        'semester',
        'city_address',
        'address',
        'status_with_parents',
        'photo',
        'regis_status',
        'note_status',
        'file_raport',
        'file_sktm',
        'photo_sitting_room',
        'photo_front_home',
        'photo_kitchen',
        'user_id',
        'coordinator_id',
        'parent_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coordinator()
    {
        return $this->belongsTo(Koordinator::class);
    }

    public function children_parent()
    {
        return $this->belongsTo(ChildrenParent::class);
    }

    public function beasiswa()
    {
        return $this->hasMany(beasiswa_report::class);
    }

    public function activity_ppas()
    {
        return $this->hasMany(activity_ppas_report::class);
    }

    public function activity_reguler()
    {
        return $this->hasMany(activity_reguler_report::class);
    }

    public function academic()
    {
        return $this->hasMany(academic_report::class);
    }
}
