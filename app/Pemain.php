<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    public function post_film()
    {
        return $this->belongsTo('App\Post_film');
    }
}
