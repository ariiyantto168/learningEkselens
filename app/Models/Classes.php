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
}
