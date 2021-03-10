<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function post_films()
    {
        return $this->belongsToMany('App\Post_film');
    }
    public function Profils()
    {
        return $this->belongsToMany('App\Profil');
    }
}
