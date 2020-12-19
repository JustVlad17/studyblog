<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function getRole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function getComments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
