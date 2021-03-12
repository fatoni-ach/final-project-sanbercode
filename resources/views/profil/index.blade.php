@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('/anime/img/normal-breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Profile</h2>
                    <p>Hello, {{$user->profil->nama}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('contentdua')
<section class="signup spad">
    <div class="container" >
        <div class="row d-flex justify-content-center">
            <div class="user-profile own-profile">
                <div class="header">
                        {{-- <a href="{{route('profil.create')}}" class="site-btn btn-primary">Create</a> --}}
                        @auth
                        <h5 class="text-light mb-1" >Nama : {{$user->profil->nama}}</h5>
                        <p class="text-light mb-1">Email : {{$user->email}}</p>
                        <p class="text-light mb-1">Tanggal lahir : {{$user->profil->tgl_lahir}}</p>
                        @endauth
                </div>
                <a href="{{Route('profil.edit')}}" class="site-btn btn-warning mt-2 ml-4">Update Profil</a>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Postingan Anda</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                {{-- <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @forelse ($user->profil->post_films as $p)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            @if ($p->foto != null)
                                <div class="product__item__pic set-bg" data-setbg="{{ asset($p->getImage()) }}">
                            @else
                                <div class="product__item__pic set-bg" data-setbg="{{asset('img/post_film/thumbnail.png')}}">
                            @endif
                                {{-- <div class="ep">18 / 18</div> --}}
                                <div class="comment"><i class="fa fa-comments"></i> {{count($p->komentars)}}</div>
                                {{-- <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    @forelse ($p->genres as $g)
                                    <li>{{$g->nama}}</li>     
                                    @empty
                                    <li>None</li>
                                    @endforelse
                                </ul>
                                <h5><a href="{{ route('homepage_show', $p->id )}}">{{$p->judul}}</a></h5>
                                <form action="{{route('profil.index')}}" method="DELETE">
                                @csrf
                                <a href="{{Route('post.delete', $id ?? '')}}" class="site-btn btn-warning mt-2">Delete Post</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="product__item">
                            <h5 class="text-light text-center bg-danger py-2">Belum ada Postingan</h5>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection