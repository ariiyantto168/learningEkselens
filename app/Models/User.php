<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'idusers';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'active' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function userprofiles()
    {
        return $this->belongsTo('App\Models\Userprofiles','idusers');
    }

    public function whislists()
    {
      return $this->hasMany('App\Models\Whislists', 'idusers');
    }


}
