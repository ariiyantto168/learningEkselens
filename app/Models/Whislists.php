<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whislists extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'whislists';
    protected $primaryKey = 'idwhislists';

    protected $fillable = [
        'active',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];
}
