<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Testimonies extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'testimonies';
    protected $primaryKey = 'idtestimonies';

    protected $fillable = [
        'name','jobrole','description'
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'idclass');
    }
}
