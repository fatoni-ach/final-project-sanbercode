<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = ['isi', 'post_film_id', 'profil_id'];
    public function post_film()
    {
        return $this->belongsTo('App\Post_film');
    }
    public function profil()
    {
        return $this->belongsTo('App\Profil');
    }
}
