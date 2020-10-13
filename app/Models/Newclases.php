<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newclases extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'newclases';
    protected $primaryKey = 'idnewclass';

    protected $fillable = [
        'name'
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'idclass');
    }
}
