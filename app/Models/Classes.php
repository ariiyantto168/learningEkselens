<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'class';
    protected $primaryKey = 'idclass';

    protected $fillable = [
        'name','images','demo'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'idcategories');
    }

    public function subclass()
    {
        return $this->hasMany('App\Models\Subclass','idclass');
    }
    public function materies()
    {
        return $this->hasMany('App\Models\Materies','idclass');
    }
}
