@extends('layouts.master')
@section('contentsatu')
<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__title">
                    <h6>Genre <span>- Tanggal</span></h6>
                    <h2>Judul</h2>
                    <div class="blog__details__social">
                        <a href="#" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a>
                        <a href="#" class="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin-square"></i> Linkedin</a>
                        <a href="#" class="twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img src="img/blog/details/blog-details-pic.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__text">
                        <p>deskripsi</p>
                    </div>
                    <div class="blog__details__item__text">
                        <h4>Tobio-Nishinoya showdown:</h4>
                        <img src="img/blog/details/bd-item-1.jpg" alt="">
                        <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                            lot more shocking than it would be in the West, but Tobio calling out teammates in
                            genuinely rude fashion in the middle of a match is what got him isolated in the first
                            place.  It’s better for the Crows to sort this out in practice matches than the real
                            deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                        a team environment.</p>
                    </div>
                    <div class="blog__details__item__text">
                        <h4>Nanatsu no Taizai: Kamigami No Gekirin</h4>
                        <img src="img/blog/details/bd-item-2.jpg" alt="">
                        <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                            lot more shocking than it would be in the West, but Tobio calling out teammates in
                            genuinely rude fashion in the middle of a match is what got him isolated in the first
                            place.  It’s better for the Crows to sort this out in practice matches than the real
                            deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                        a team environment.</p>
                    </div>
                    <div class="blog__details__item__text">
                        <h4>ID:Ianvaded:</h4>
                        <img src="img/blog/details/bd-item-3.jpg" alt="">
                        <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                            lot more shocking than it would be in the West, but Tobio calling out teammates in
                            genuinely rude fashion in the middle of a match is what got him isolated in the first
                            place.  It’s better for the Crows to sort this out in practice matches than the real
                            deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                        a team environment.</p>
                    </div>
                    {{-- tags genre --}}
                    <div class="blog__details__tags">
                        <a href="#">Healthfood</a>
                        <a href="#">Sport</a>
                        <a href="#">Game</a>
                    </div>
                    {{-- space untuk rating film --}}

                    {{-- space untuk rating film --}}
                        <div class="blog__details__comment">
                            <h4>3 Comments</h4> {{-- kolom komentar --}}
                            <div class="blog__details__comment__item">
                                <div class="blog__details__comment__item__pic">
                                    <img src="img/blog/details/comment-1.png" alt="">
                                </div>
                                <div class="blog__details__comment__item__text">
                                    <span>Sep 08, 2020</span>
                                    <h5>John Smith</h5>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi</p>
                                    <a href="#">Like</a>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                            <div class="blog__details__comment__item blog__details__comment__item--reply">
                                <div class="blog__details__comment__item__pic">
                                    <img src="img/blog/details/comment-2.png" alt="">
                                </div>
                                <div class="blog__details__comment__item__text">
                                    <span>Sep 08, 2020</span>
                                    <h5>Elizabeth Perry</h5>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi</p>
                                    <a href="#">Like</a>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                            <div class="blog__details__comment__item">
                                <div class="blog__details__comment__item__pic">
                                    <img src="img/blog/details/comment-3.png" alt="">
                                </div>
                                <div class="blog__details__comment__item__text">
                                    <span>Sep 08, 2020</span>
                                    <h5>Adrian Coleman</h5>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi</p>
                                    <a href="#">Like</a>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__form">
                            <h4>Leave A Commemt</h4> {{-- input komentar baru --}}
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Message"></textarea>
                                        <button type="submit" class="site-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection