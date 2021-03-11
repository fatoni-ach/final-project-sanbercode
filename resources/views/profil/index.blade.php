@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('/anime/img/normal-breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Profile</h2>
                    <p>Hello</p>
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
                        <a href="{{route('profil.create')}}" class="site-btn btn-primary">Create</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection