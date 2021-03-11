@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg=" {{ asset('/anime/img/normal-breadcrumb.jpg') }} ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Login</h2>
                    <p>Welcome to the Blog Review Movie.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('contentdua')
@if (Session::has('sukses_create_login'))
<div class="alert alert-success alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ Session::get('sukses_create_login')}}</strong>
</div>
@endif
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Login</h3>
                    <form action="{{Route('login')}}" method="POST">
                        @csrf
                        <div class="input__item">
                            <input type="text" name="email" placeholder="Email address" value="{{old('email')}}">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input type="password" name="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" class="site-btn">Login Now</button>
                    </form>
                    {{-- <a href="#" class="forget_pass">Forgot Your Password?</a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Dont’t Have An Account?</h3>
                    <a href="{{route('signup')}}" class="primary-btn">Register Now</a>
                </div>
            </div>
        </div>
        {{-- <div class="login__social">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <span>or</span>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                            Facebook</a></li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
@endsection