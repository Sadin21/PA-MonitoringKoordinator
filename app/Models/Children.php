<?php

namespace App\Models;

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
        'address',
        'status_with_parents',
        'photo',
        'regis_status',
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

    // public function donate_report()
    // {
    //     return $this->hasOne(donate_report::class);
    // }
}
