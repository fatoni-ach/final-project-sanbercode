<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RevCinema | Review Film</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href=" {{ asset('/anime/css/bootstrap.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('/anime/css/font-awesome.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('/anime/css/elegant-icons.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('/anime/css/plyr.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('/anime/css/nice-select.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('/anime/css/owl.carousel.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('/anime/css/slicknav.min.css') }} " type="text/css">
    <link rel="stylesheet" href=" {{ asset('/anime/css/style.css') }} " type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Header Section Begin -->
    @include('layouts.partials.header')
    <!-- Header End -->

    <!-- Hero Section Begin -->
    @yield('contentsatu')
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    @yield('contentdua')
<!-- Product Section End -->

<!-- Footer Section Begin -->
@include('layouts.partials.footer')
  <!-- Footer Section End -->

<!-- Search model Begin -->
@include('layouts.partials.search')
<!-- Search model end -->


<!-- Js Plugins -->
<script src=" {{ asset('/anime/js/jquery-3.3.1.min.js') }} "></script>
<script src=" {{ asset('/anime/js/bootstrap.min.js') }} "></script>
<script src=" {{ asset('/anime/js/player.js') }} "></script>
<script src=" {{ asset('/anime/js/jquery.nice-select.min.js') }} "></script>
<script src=" {{ asset('/anime/js/mixitup.min.js') }} "></script>
<script src=" {{ asset('/anime/js/jquery.slicknav.js') }} "></script>
<script src=" {{ asset('/anime/js/owl.carousel.min.js') }} "></script>
<script src=" {{ asset('/anime/js/main.js') }} "></script>


</body>

</html>