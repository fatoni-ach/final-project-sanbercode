<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Rating, User};

class RatingController extends Controller
{
    public function create(Request $request)
    {
        $profil = User::find(Auth::user()->id)->profil;
        $rating = Rating::where('post_film_id', $request['post_id'])->where('profil_id', $profil->id)->first();
        if($rating != null){
            $rating->point = $request['point'];
            $rating->update();
        }else{
            Rating::Create([
                'post_film_id' => $request['post_id'],
                'profil_id'  => $profil->id,
                'point'     => $request['point'],
            ]);
        }
        return redirect()->back();
    }
}
