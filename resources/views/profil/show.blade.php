@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('/anime/img/normal-breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Profile</h2>
                    <p>Hello, {{$profil['nama']}} </p>
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
            <div class="mt-3">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                      </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$profil['id']}}</th>
                                <td>{{$profil['nama']}}</td>
                                <td>{{$profil['tgl_lahir']}}</td>
                            </tr>          
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <a href="/profil/{{$profil['id']}}/edit" class="site-btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection