@extends('layouts.master')
@section('contentsatu')
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    {{-- @if ($post->foto != null) --}}
                    <div class="anime__details__pic set-bg" data-setbg="img/anime/details-pic.jpg">
                    {{-- @else --}}
                    <div class="anime__details__pic set-bg" data-setbg="{{asset('img/post_film/thumbnail.png')}}">
                    {{-- @endif --}}
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>Test{{--$post['judul']--}}</h3>
                        </div>
                        <p>testing{{--$post['sinopsis']--}}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Tahun: </span> {{--$post['tahun']--}}</li>
                                    </ul>
                                </div>
                                <div class="anime__details__btn">
                                    <a href="#" class="follow-btn"><i class="fa fa-edit-o"></i> Edit</a>
                                    <a href="#" class="watch-btn"><span>Delete</span></a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection