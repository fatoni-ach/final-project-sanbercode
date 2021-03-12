<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('review.post');
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
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tahun' => 'required'
        ]);

        $post = Post_film::Create([
            'judul' => $request['judul'],
            'sinopsis' => $request['nama'],
            'foto' => $request['foto'],
            'tahun' => $request['tahun']
        ]);

        return redirect('review.show');
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
        return view ('review.edit', compact('post'));
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
        $post = Post_film::where('id', $id)->update([
            'judul' => $request['judul'],
            'sinopsis' => $request['nama'],
            'foto' => $request['foto'],
            'tahun' => $request['tahun']
        ]);
        return redirect('review.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post_film::destroy($id);
        return redirect('profil.index');
    }
}
