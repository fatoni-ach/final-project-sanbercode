<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{User, Komentar};

class KomentarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function update($id, Request $request)
    {
        $request->validate([
            'isi' => 'required'
        ]);
        $komentar = Komentar::find($id);
        $komentar->isi = $request['isi'];
        $komentar->update();
        return redirect()->back();
    }
    public function destroy($id)
    {
        $komentar = Komentar::find($id);
        $komentar->delete();
        return redirect()->back();
    }
}
