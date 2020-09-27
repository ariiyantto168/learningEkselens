<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materies extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'materies';
    protected $primaryKey = 'idmateries';

    protected $fillable = [
        'materi',
    ];

   


}
