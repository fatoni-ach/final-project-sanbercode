@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('/anime/img/normal-breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Profile</h2>
                    <p>Hello {{$user->profil->nama}}</p>
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
                <a href="{{Route('profil.edit')}}" class="btn btn-danger mt-2">Update Profil</a>
            </div>
        </div>
    </div>
</section>
@endsection