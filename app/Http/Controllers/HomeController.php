<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Post_film, Film_genre};
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function homepage()
    {
        $post = Post_film::get();
        $context = ([
            'page'  => 'home',
        ]);
        return view('index', compact('post', 'context'));
    }

    public function show($id)
    {
        $context = ([
            'page'  => 'home',
        ]);
        $post = Post_film::find($id);
        return view('review.index', compact('post', 'context'));
    }
}
