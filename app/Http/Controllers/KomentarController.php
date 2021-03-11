<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{User, Komentar};

class KomentarController extends Controller
{
    public function create($id, Request $request)
    {
        // dd($id);
        $profil = User::find(Auth::user()->id)->profil;
        Komentar::Create([
            'isi' => $request['isi'],
            'post_film_id' => $id,
            'profil_id' => $profil->id,
        ]);
        return redirect()->back();
    }
}
