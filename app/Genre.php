<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function Post_films()
    {
        return $this->belongsToMany('App\Post_film', 'film_genres', 'genre_id', 'post_film_id');
    }
    protected $fillable = ['nama'];
}
