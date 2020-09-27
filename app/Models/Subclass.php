<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subclass extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'subclass';
    protected $primaryKey = 'idsubclass';

    protected $fillable = [
        'headmateri',
    ];

    public function materies()
    {
        return $this->hasMany('App\Models\Materies','idsubclass');
    }

   
    
    
}
