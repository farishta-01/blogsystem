<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Travel | Bootstrap blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="/vendor/swiper/swiper-bundle.min.css">
    <!-- Owl Carousel -->
    {{-- <link rel="stylesheet" href="/vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/vendor/owl.carousel2/assets/owl.theme.default.min.css"> --}}
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css/">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/favicon.png/">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header-->
    <header class="header">
        <!-- Top bar -->
        <div class="py-2 bg-dark text-white">
            <div class="container py-1">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <ul class="list-inline mb-0 text-sm">
                            <li class="list-inline-item"><a class="reset-anchor" href="#!">About us</a></li>
                            <li class="list-inline-item">|</li>
                            <li class="list-inline-item"><a class="reset-anchor" href="#!">Sitemap</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block text-center">
                        <ul class="list-inline mb-0 small">
                            <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                        class="fab fa-youtube"></i></a></li>
                            <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                        class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block text-end">
                        <div class="dropdown text-sm"><a class="reset-anchor dropdown-toggle" id="destinations"
                                href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-haspopup="true"
                                aria-expanded="false"><i class="fas fa-globe-americas me-2"></i>Destinations</a>
                            <div class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="destinations"><a
                                    class="dropdown-item text-sm" href="#!">France</a><a
                                    class="dropdown-item text-sm" href="#!">Germany</a><a
                                    class="dropdown-item text-sm" href="#!">Spain</a><a
                                    class="dropdown-item text-sm" href="#!">Egypt</a><a
                                    class="dropdown-item text-sm" href="#!">Thailand</a><a
                                    class="dropdown-item text-sm" href="#!">Indonesia</a><a
                                    class="dropdown-item text-sm" href="#!">Maldives</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar 1 -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-4">
            <div class="container text-center"><a class="navbar-brand mx-auto" href="{{ route('home') }}"><img
                        class="mb-2" src="/img/logo.svg" alt="" width="140">
                    <p class="text-sm text-uppercase text-gray mb-0">Your next pocket travel guide</p>
                </a></div>
        </nav>
        <!-- Navbar 2 -->
        <nav class="navbar navbar-expand-lg navbar-light border-gray py-2 bg-light">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right mx-auto border-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-1">
                            <!-- Link--><a class="nav-link active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item px-1">
                            <!-- Link--><a class="nav-link" href="{{ route('listing.page') }}">Listing</a>
                        </li>

                        @if (auth()->check())
                            <li class="nav-item px-1 dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->username }}
                                </a>
                                <div class="dropdown-menu text-center text-lg-start shadow-sm"
                                    aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('home') }}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout.client') }}">Logout</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item px-1">
                                <a class="nav-link" href="{{ route('loginClient') }}">Login</a>
                            </li>
                        @endif


                    </ul>
                </div>
            </div>
        </nav>
    </header>


    @yield('content')





    <footer class="bg-dark py-4">
        <div class="container">
            <div class="row py-2 gy-2">
                <div class="col-lg-4 text-center text-lg-start">
                    <p class="small text-muted text-uppercase mb-0">&copy; copyright 2021 - all rights reserved</p>
                </div>
                <div class="col-lg-4 text-center">
                    <ul class="list-inline text-white small mb-0">
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                    class="fab fa-youtube"></i></a></li>
                        <li class="list-inline-item"><a class="reset-anchor" href="#!"><i
                                    class="fab fa-vimeo-v"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <p class="small text-muted text-uppercase mb-0">Template designed by <a
                            href="/https://bootstrapious.com/p/bootstrap-travel-blog-template">Bootstrapious</a>. </p>
                    <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    </footer>
