@extends('layouts.master')
@section('contentsatu')
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    @if ($post->foto != null)
                    <div class="anime__details__pic set-bg" data-setbg="img/anime/details-pic.jpg">
                    @else
                    <div class="anime__details__pic set-bg" data-setbg="{{asset('img/post_film/thumbnail.png')}}">
                    @endif
                        <div class="comment"><i class="fa fa-comments"></i> {{count($post->komentars)}}</div>
                        {{-- <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{$post->judul}}</h3>
                            {{-- <span>フェイト／ステイナイト, Feito／sutei naito</span> --}}
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($rating->avg('point') >= $i+1)
                                    <a href=""><i class="fa fa-star"></i></a>
                                    @else
                                    <a href=""><i class="fa fa-star-o"></i></a>
                                    @endif
                                @endfor
                            </div>
                            <span>{{number_format($rating->avg('point'), 1)}} average star</span>
                        </div>
                        <p>{{$post->sinopsis}}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Tahun: </span> {{$post->tahun}}</li>
                                        @auth
                                        <form action="{{Route('rating.create')}}" class="form-inline" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$post->id}}" name="post_id">
                                        <li><span>Rating :</span>  
                                        </li>
                                        <select name="point">
                                            <optgroup label="point">
                                                @for ($i = 0; $i < 5; $i++)
                                                @if ($current_rating != null && $current_rating->point == $i+1)
                                                    <option selected="selected" value="{{$i+1}}">{{$i+1}}</option>
                                                @else
                                                    <option value="{{$i+1}}">{{$i+1}}</option>
                                                @endif
                                                @endfor
                                            </optgroup>
                                        </select> 
                                        <button class="btn btn-danger ml-1">Give Rating</button>
                                        </form>
                                        @endauth
                                        
                                        {{-- <li><span>Studios:</span> Lerche</li>
                                        <li><span>Date aired:</span> Oct 02, 2019 to ?</li>
                                        <li><span>Status:</span> Airing</li>
                                        <li><span>Genre:</span> Action, Adventure, Fantasy, Magic</li> --}}
                                    </ul>
                                </div>
                                {{-- <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Scores:</span> 7.31 / 1,515</li>
                                        <li><span>Rating:</span> 8.5 / 161 times</li>
                                        <li><span>Duration:</span> 24 min/ep</li>
                                        <li><span>Quality:</span> HD</li>
                                        <li><span>Views:</span> 131,541</li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="anime__details__btn">
                            <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                            <a href="#" class="watch-btn"><span>Watch Now</span> <i
                                class="fa fa-angle-right"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($post->komentars as $k)
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{asset('img/post_film/thumbnail.png')}}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>{{$k->profil->nama}} - <span> updated {{$k->updated_at->diffForHumans()}}</span>
                                    @if (Auth::check() && $user->profil->id == $k->profil_id)
                                    <a href="{{route('komentar.delete', $k->id)}}">hapus</a>
                                    <a data-toggle="collapse" href="#edit{{$k->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">edit</a>
                                    @endif
                                </h6>
                                <p>{{$k->isi}}</p>
                                <div class="collapse" id="edit{{$k->id}}">
                                    <div class="card card-body">
                                        <form action="{{route('komentar.update', $k->id)}}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input class="" type="text" value="{{$k->isi}}" name="isi">
                                            <button class="btn btn-warning btn-sm" type="submit">edit</button>
                                        </form>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-2.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-3.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-4.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-5.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-6.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div> --}}
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{route('komentar.create' , $post->id)}}" method="POST">
                            @csrf
                            {{-- <input type="hidden" value="{{$post->id}}"> --}}
                            <textarea placeholder="Your Comment" name="isi"></textarea>
                            @if (Auth::check())
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                            @else
                            <a class="btn btn-danger" href="{{route('login')}}"><i class="fa fa-location-arrow"></i> Login untuk komentar</a>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection