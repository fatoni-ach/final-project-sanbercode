<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film_genre extends Model
{
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
    public function post_films()
    {
        return $this->belongsToMany('App\Post_film');
    }
}
