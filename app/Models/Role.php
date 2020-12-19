<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getuser()
    {
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }
}
