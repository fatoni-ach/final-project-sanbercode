<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Profil, User};
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        # code...
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('profil.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required'
        ]);

        $profil = Profil::Create([
            'nama' => $request['nama'],
            'tgl_lahir' => $request['tgl_lahir']
        ]);

        return redirect('profil.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = Profil::find($id);
        return view ('profil.show', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view ('profil.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profil = User::find(Auth::user()->id)->profil;
        $profil->nama = $request['nama'];
        $profil->tgl_lahir = $request['tgl_lahir'];
        $profil->update();
        return redirect(route('profil.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profil::destroy($id);
        return redirect('profile.index');
    }
}
