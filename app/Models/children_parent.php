<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class children_parent extends Model
{
    use HasFactory;
    protected $table = 'children_parents';
    protected $fillable = [
        'name',
        'birth_place',
        'birth_date',
        'marital',
        'tertiary_education',
        'address',
        'job',
        'phone',
        'salary',
        'home_status',
        'number_of_souls',
        'category_of_souls',
        'nik',
        'file_ktp',
        'file_kk'
    ];

    public function children()
    {
        return $this->hasMany('App\Models\child');
    }
}
