<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Post_film, User, Genre, Pemain, Komentar};
use App\Classes\OptimizeImage;


class Post_filmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post_film::all();
        return view('review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::get();
        $pemain = Pemain::select('nama')->distinct()->get();
        return view('review.Post', compact('genre', 'pemain'));
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
            'judul' => 'required',
            'sinopsis' => 'required',
            'genre' =>'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'pemain' => 'required',
            'tahun' => 'required'
        ]);

        $gambar = $request->foto;
        $new_gambar = time() . '-post_film.png';
        $directory = $gambar->move('img/post_film/', $new_gambar);

        $user = User::find(Auth::user()->id);
        $post = Post_film::Create([
            'judul' => $request['judul'],
            'sinopsis' => $request['sinopsis'],
            'foto' => $new_gambar,
            'tahun' => $request['tahun'],
            'profil_id' => $user->profil->id
        ]);

        $genre_id = [];
        foreach ($request->genre as $g){
            $genre = Genre::firstOrCreate(['nama' => $g]);
            $genre_id[] = $genre->id;
        }

        foreach($request->pemain as $p){
            $pemain = Pemain::create([
                'nama' => $p,
                'post_film_id'  => $post->id
            ]);
        }
        $post->genres()->attach($genre_id);

        $optimizer = new OptimizeImage();
        $optimizer->medium(base_path().'/public/'.$directory);
        $request->session()->flash('sukses', 'Postingan berhasil dibuat');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($request->all());
        $context = ([
            'page'  => 'home',
        ]);
        $post = Post_film::find($id);
        return view('review.index', compact('post', 'context'));
        // $post = Post_film::find($id);
        // return view ('review.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post_film::find($id);
        $genre = Genre::get();
        $pemain = Pemain::select('nama')->distinct()->get();
        return view ('review.edit', compact('post', 'genre', 'pemain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'genre' =>'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'pemain' => 'required',
            'tahun' => 'required'
        ]);
        $post = Post_film::find($id);
        if(file_exists($request->file('gambar'))){
            $urlImage = base_path()."/public/".($post->getImage());
                if(file_exists($urlImage)){
                    unlink($urlImage);
            }
            $gambar = $request->gambar;
            $new_gambar = time() . '-post_film.png';
            $directory = $gambar->move('img/post_film/', $new_gambar);
            $optimizer = new OptimizeImage();
            $optimizer->medium(base_path().'/public/'.$directory);
            $post->foto = $new_gambar;
        }
        $post->update($request->all());

        $genre_id = [];
        foreach ($request->genre as $g){
            $genre = Genre::firstOrCreate(['nama' => $g]);
            $genre_id[] = $genre->id;
        }
        $genre_id = array_unique($genre_id);
        $post->genres()->sync($genre_id);
        
        // $pemain = Pemain::where('post_film_id', $id)->get();
        Pemain::where('post_film_id', $post->id)->delete();
        $pemain_unique=[];
        foreach($request->pemain as $p){
            $pemain_unique[] = $p;
        }
        // dd($pemain_unique);
        $pemain_unique = array_unique($pemain_unique);
        foreach($pemain_unique as $p){
            $pemain = Pemain::create([
                'nama' => $p,
                'post_film_id'  => $post->id
            ]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post_film::find($id);
        $post->genres()->detach();
        $post->ratings()->detach();
        Komentar::where('post_film_id', $post->id)->delete();
        Pemain::where('post_film_id', $post->id)->delete();
        $urlImage = base_path()."/public/".($post->getImage());
            if(file_exists($urlImage)){
                unlink($urlImage);
        }
        $post->delete();
        return redirect()->back();
    }
}
