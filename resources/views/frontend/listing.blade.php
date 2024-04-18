@extends('frontend.master')

@section('content')
    <!-- Hero section -->
    <section class="hero bg-center bg-cover" style="background: url(img/hero-banner.jpg)">
        <div class="dark-overlay py-5">
            <div class="overlay-content">
                <div class="container py-5 text-white text-center">
                    <h1>Blog listing</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog listing -->
    <section class="pt-5">
        <div class="container pt-5">
            <div class="row mb-5">
                <div class="col-lg-8">
                    <div class="row text-center">
                        @foreach ($post as $post)
                            <div class="row text-center">
                                <div class="col-lg-6 mb-5"><a href="{{ route('post.show', ['id' => $post->id]) }}"><img
                                            src="{{ asset('upload') . '/' . $post->photo }}" alt="Photo" width="265.33"
                                            height="259.99"></a><br>
                                    <li class="list-inline-item me-0 text-gray align-middle">By </li>
                                    <li class="list-inline-item align-middle me-0"><a class="fw-bold reset-anchor"
                                            href="#!">{{ $post->author }}</a></li>
                                    <ul class="list-inline small text-uppercase mb-0">

                                        <li class="list-inline-item text-gray align-middle me-0">|</li>
                                        <li class="list-inline-item text-gray align-middle">{{ $post->created_at }}</li>

                                        <h3 class="h4 mt-2"> <a class="reset-anchor"
                                                href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->tittle }}</a>
                                        </h3><a class="reset-anchor text-gray text-uppercase small mb-2 d-block"
                                            href="#!">{{ $post->category->name }}</a>
                                    </ul>

                                    <p class="text-small mb-1">{{ $post->desc }}</p><a class="btn btn-link"
                                        href="{{ route('post.show', ['id' => $post->id]) }}">Continue reading</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Listing navigation -->
                    <div class="p-4 bg-light mb-5">
                        <div class="row gy-2">
                            <div class="col-sm-6 text-center text-sm-start"><a class="btn btn-outline-secondary btn-sm"
                                    href="#!"><i class="fas fa-angle-left me-2"></i>Prev posts</a></div>
                            <div class="col-sm-6 text-center text-sm-end"><a class="btn btn-outline-secondary btn-sm"
                                    href="#!">Next posts<i class="fas fa-angle-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- About me widget -->
                    <div class="mb-5 text-center"><img class="mb-3 rounded-circle img-thumbnail shadow-sm"
                            src="/img/author.jpg" alt="" width="110">
                        <h3 class="h4">About me</h3>
                        <p class="text-sm text-muted px-sm-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod.</p><img class="d-block mx-auto mb-3" src="img/signature.png" alt=""
                            width="60">
                        <ul class="list-inline text-sm mb-0">
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
                    <!-- Categories widget -->
                    <div class="mb-5 text-center"><a class="category reset-anchor bg-cover bg-center mb-2"
                            href="{{ route('medicalGuide') }}" style="background: url(/img/category-1.jpg)">
                            <p class="category-title text-uppercase small">Medical Guide</p>
                        </a><a class="category reset-anchor bg-cover bg-center mb-2" href="{{ route('travelGuide') }}"
                            style="background: url(/img/category-2.jpg)">
                            <p class="category-title text-uppercase small">Travel Guide</p>
                        </a><a class="category reset-anchor bg-cover bg-center mb-2" href="{{ route('studyGuide') }}"
                            style="background: url(/img/category-3.jpg)">
                            <p class="category-title text-uppercase small">Study Guide</p>
                        </a><a class="category reset-anchor bg-cover bg-center" href="{{ route('scientificGuide') }}"
                            style="background: url(/img/category-3.jpg)">
                            <p class="category-title text-uppercase small">Scientific Guide</p>
                        </a></div>
                    <!-- Newsletter widget -->
                    <div class="px-4 py-5 bg-light mb-5 text-center">
                        <h3 class="h5"><i class="far fa-envelope me-2"></i>Join the family</h3>
                        <p class="text-sm text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod.</p>
                        <form action="#">
                            <div class="mb-1">
                                <input class="form-control form-control-sm" type="email" name="email"
                                    placeholder="Emaill address">
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-dark w-100 btn-sm" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <!-- Latest posts widget -->
                    {{-- <div class="mb-5">
                        <h3 class="h5">Latest posts</h3>
                        <p class="text-sm text-muted mb-4">Lorem ipsum dolor sit, consectetur adipisicing elit, sed do
                            eiusmod.</p>
                        <ul class="list-unstyled">
                            @foreach ($post as $singlePost)
                                <li class="d-flex mb-1">
                                    <a href="{{ route('post.show', $singlePost->id) }}"><img
                                            src="{{ asset('upload') . '/' . $singlePost->photo }}" alt=""
                                            width="80"></a>
                                    <div class="media-body ms-3">
                                        <p class="small text-primary text-uppercase mb-0">
                                            {{ $singlePost->created_at->format('j M Y') }}</p>
                                        <h6 class="mb-1"><a class="reset-anchor"
                                                href="{{ route('post.show', $singlePost->id) }}">{{ $singlePost->title }}</a>
                                        </h6>
                                        <p class="small text-muted">{{ $singlePost->desc }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}




                    <div class="mb-5">
                        <h3 class="h5">Latest posts</h3>
                        <p class="text-sm text-muted mb-4">Lorem ipsum dolor sit, consectetur adipisicing elit, sed do
                            eiusmod.</p>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-1"><a href="post.html"><img src="img/recent-posts-thumb-1.jpg"
                                        alt="" width="80"></a>
                                <div class="media-body ms-3">
                                    <p class="small text-primary text-uppercase mb-0">5 Aug 2018</p>
                                    <h6 class="mb-1"><a class="reset-anchor" href="post.html">The top climbing
                                            tours</a></h6>
                                    <p class="small text-muted">Lorem ipsum dolor sit, consectetur adipisicing elit, sed.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex mb-1"><a href="post.html"><img src="img/recent-posts-thumb-2.jpg"
                                        alt="" width="80"></a>
                                <div class="media-body ms-3">
                                    <p class="small text-primary text-uppercase mb-0">5 Aug 2018</p>
                                    <h6 class="mb-1"><a class="reset-anchor" href="post.html">Travel guide to
                                            Canada</a></h6>
                                    <p class="small text-muted">Lorem ipsum dolor sit, consectetur adipisicing elit, sed.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex mb-1"><a href="post.html"><img src="img/recent-posts-thumb-3.jpg"
                                        alt="" width="80"></a>
                                <div class="media-body ms-3">
                                    <p class="small text-primary text-uppercase mb-0">5 Aug 2018</p>
                                    <h6 class="mb-1"><a class="reset-anchor" href="post.html">A day in Tailand</a></h6>
                                    <p class="small text-muted">Lorem ipsum dolor sit, consectetur adipisicing elit, sed.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Instagram widget -->
                    <div class="mb-5">
                        <h3 class="h5">Follow on Instagram</h3>
                        <p class="text-sm text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod.</p>
                        <div class="row gx-0">
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-1.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-2.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-3.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-4.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-5.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-6.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-8.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="img/instagram-1.jpg"
                                            alt=""></div>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="js/front.js"></script>
    <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </body>

    </html>
@endsection
