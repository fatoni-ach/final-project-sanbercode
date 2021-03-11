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
        $post_film = Post_film::all();
        return view('review.index', compact('post_film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'foto' => 'required',
            'tahun' => 'required'
        ]);

        $post_film = Post_film::Create([
            'judul' => $request['judul'],
            'sinopsis' => $request['nama'],
            'foto' => $request['foto'],
            'tahun' => $request['tahun']
        ]);

        return redirect('review');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_film = Post_film::find($id);
        return view ('review', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_film = Post_film::find($id);
        return view ('review.edit', compact('review'));
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
        $post_film = Post_film::where('id', $id)->update([
            'judul' => $request['judul'],
            'sinopsis' => $request['nama'],
            'foto' => $request['foto'],
            'tahun' => $request['tahun']
        ]);
        return redirect('review');
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
        return redirect('review');
    }
}
