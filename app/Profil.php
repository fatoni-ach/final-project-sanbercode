<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function post_films()
    {
        return $this->hasMany('App\Post_film');
    }
    public function komentars()
    {
        return $this->hasMany('App\Komentar');
    }
    public function ratings()
    {
        return $this->belongsToMany('App\Post_film', 'Ratings', 'profil_id', 'post_film_id');
    }
    protected $fillable = ['nama', 'tgl_lahir', 'user_id'];
}
