<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'Categories';
    protected $primaryKey = 'idcategories';

    protected $fillable = [
        'name',
    ];
}
