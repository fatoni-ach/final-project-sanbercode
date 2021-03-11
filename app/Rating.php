<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['post_film_id', 'profil_id', 'point'];
    public function post_films()
    {
        return $this->belongsToMany('App\Post_film');
    }
    public function Profils()
    {
        return $this->belongsToMany('App\Profil');
    }
}
