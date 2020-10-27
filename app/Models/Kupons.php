<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kupons extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'kupons';
    protected $primaryKey = 'idkupons';

    protected $fillable = [
        'name','potongan','slug','images'
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'idclass');
    }
}
