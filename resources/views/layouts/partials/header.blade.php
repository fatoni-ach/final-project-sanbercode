<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{route('homepage')}}">
                        <img src=" {{ asset('/anime/img/logonew.png') }} " alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{route('homepage')}}">Home</a></li>
                            <li><a href="./categories.html">Genre <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <li><a href="./categories.html">genre a</a></li>
                                    <li><a href="./categories.html">genre dll</a></li>
                                    {{-- <li><a href="./anime-details.html">Blog</a></li>
                                    <li><a href="./anime-watching.html">Anime Watching</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li> --}}
                                </ul>
                            </li>
                            @guest
                            <li><a href="{{route('signup')}}">Sign Up</a></li>
                            <li><a href="{{Route('login')}}">Login</a></li>
                            @endguest
                            @auth
                            <li><a href="{{Route('profil.index')}}">Profile</a></li>
                            <li><a href="{{Route('post_film.create')}}">Buat Postingan</a></li>
                            <li><a class="btn btn-danger" href="{{route('logout')}}">Logout</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <a href="{{route('profil.index')}}"><span class="icon_profile"></span>
                    @auth
                        {{$user->profil->nama ?? ''}}
                    @endauth
                    </a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>