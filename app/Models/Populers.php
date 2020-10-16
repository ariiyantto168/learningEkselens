<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Populers extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'populers';
    protected $primaryKey = 'idpopulers';

    protected $fillable = [
        'name'
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'idclass');
    }
}
