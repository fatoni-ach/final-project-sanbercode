<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_film extends Model
{
    public function ratings()
    {
        return $this->belongsToMany('App\Profil', 'rating', 'post_film_id', 'profil_id');
    }
    public function profil()
    {
        return $this->belongsTo('App\Profil');
    }
    public function pemains()
    {
        return $this->hasMany('App\Pemain');
    }
    public function komentars()
    {
        return $this->hasMany('App\Komentar');
    }
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'film_genre', 'post_film_id', 'genre_id');
    }
}
