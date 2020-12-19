<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function logins()
    {
        //return $this->hasMany('App\Models\Comment');
        return $this->hasManyThrough('App\Models\User', 'App\Models\Comment',
                                    'post_id', 'id', 'id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getCategory()
    {
        return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }
}
