<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'careers';
    protected $primaryKey = 'idcareers';

    protected $fillable = [
        'name'
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'idclass');
    }
}
