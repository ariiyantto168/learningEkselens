<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discounts extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'discounts';
    protected $primaryKey = 'iddiscounts';

    protected $fillable = [
        'name','potongan','slug','images'
    ];
}
