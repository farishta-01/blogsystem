@extends('frontend.master')

@section('content')
    <!-- Destinations -->
    <section class="pt-5">
        <div class="container">
            <h1>Featured Destinations</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis aliquid</p>
        </div>
        <div class="swiper destinations-slider swiper-padding">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-4.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Paris</p>
                            <h2 class="h3 mb-4">France</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-2.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Tokyo</p>
                            <h2 class="h3 mb-4">Japan</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-3.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Madrid</p>
                            <h2 class="h3 mb-4">Spain</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-1.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Rome</p>
                            <h2 class="h3 mb-4">Italy</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-5.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Jakarta</p>
                            <h2 class="h3 mb-4">Indonesia</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-6.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Ottawa</p>
                            <h2 class="h3 mb-4">Canada</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-7.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Cairo</p>
                            <h2 class="h3 mb-4">Egypt</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-4.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Berlin</p>
                            <h2 class="h3 mb-4">Germany</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-2.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Bangkok</p>
                            <h2 class="h3 mb-4">Thailand</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-3.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">Malé</p>
                            <h2 class="h3 mb-4">Maldives</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
                <div class="swiper-slide h-auto"><a class="destination d-flex align-items-end bg-center bg-cover"
                        href="post.html" style="background: url(img/travel-home-1.jpg)">
                        <div class="destination-inner w-100 text-center text-white index-forward has-transition">
                            <p class="small text-uppercase mb-0">New York</p>
                            <h2 class="h3 mb-4">United States</h2>
                            <div class="btn btn-primary w-100 destination-btn text-white">Discover</div>
                        </div>
                    </a></div>
            </div>
            <div class="swiper-button-prev swiper-custom-nav text-uppercase letter-spacing-0">
                <svg class="svg-icon svg-icon me-1">
                    <use xlink:href="#arrow-left-1"> </use>
                </svg><span class="text-sm">Prev</span>
            </div>
            <div class="swiper-button-next swiper-custom-nav text-uppercase letter-spacing-0"><span
                    class="text-sm">Next</span>
                <svg class="svg-icon svg-icon ms-1">
                    <use xlink:href="#arrow-right-1"> </use>
                </svg>
            </div>
        </div>
    </section>
    <!-- Divider Section -->
    <section class="py-5">
        <div class="container py-4">
            <!-- Home listing -->
            <div class="row align-items-stretch gx-lg-0">
                <div class="col-lg-6 order-2 order-lg-1 bg-full-left">
                    <div class="h-100 bg-light d-flex align-items-center">
                        <div class="py-5 px-4">
                            <p class="text-primary font-weight-bold small text-uppercase mb-2">Travel guide</p>
                            <h3 class="h4"> <a class="text-reset" href="post.html">Book to inspire your
                                    travel</a></h3>
                            <div class="text-muted">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quam nobis autem
                                    voluptate illum beatae atque suscipit inventore tenetur, perferendis facere sequi
                                    optio laudantium obcaecati aliquam, dolores ea. Pariatur, repellendus.</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quam nobis autem
                                    voluptate illum beatae atque suscipit inventore tenetur, perferendis facere sequi
                                    optio laudantium obcaecati aliquam, dolores ea. Pariatur, repellendus.</p>
                            </div>
                            <ul class="list-inline small text-uppercase mb-0">
                                <li class="list-inline-item align-middle"><img class="rounded-circle shadow-sm"
                                        src="img/person-1.jpg" alt="" width="30" /></li>
                                <li class="list-inline-item me-0 text-gray align-middle">By </li>
                                <li class="list-inline-item align-middle me-0"><a class="fw-bold reset-anchor"
                                        href="#!">Jason Doe</a></li>
                                <li class="list-inline-item text-gray align-middle me-0">|</li>
                                <li class="list-inline-item text-gray align-middle">Jan, 2019</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2"><a class="d-block h-100 bg-center bg-cover" href="post.html"
                        style="background: url(img/travel-home-divider.jpg)"></a></div>
            </div>
        </div>
    </section>
    <!-- Instagram section-->
    <section class="pb-5">
        <div class="container pb-4">
            <header class="text-center mb-5">
                <h2>Backpack traveler</h2>
                <p>A place for your Instagram pictures or gallery.</p>
            </header>
            <div class="row">
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-1.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-2.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-3.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-4.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-5.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-6.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-1.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img
                            class="img-fluid" src="img/listing-tnumbnail-2.jpg" alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
            </div>
        </div>
    </section>
    <!-- Travel essentials section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <header class="text-center mb-5">
                <h2>My travel essentials</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </header>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6"><a class="text-reset" href="post.html"><img class="mb-4"
                            src="img/bag.png" alt="" height="150">
                        <h3 class="h5">Backpack</h3>
                        <p class="text-sm text-muted">Deserunt et ad culpa culpa dolore.</p>
                    </a></div>
                <div class="col-lg-3 col-md-6"><a class="text-reset" href="post.html"><img class="mb-4"
                            src="img/camera.png" alt="" height="150">
                        <h3 class="h5">Camera</h3>
                        <p class="text-sm text-muted">Consectetur ex sunt duis minim quis dolor.</p>
                    </a></div>
                <div class="col-lg-3 col-md-6"><a class="text-reset" href="post.html"><img class="mb-4"
                            src="img/glasses.png" alt="" height="150">
                        <h3 class="h5">Sunglasses</h3>
                        <p class="text-sm text-muted">Deserunt et ad culpa culpa dolore.</p>
                    </a></div>
                <div class="col-lg-3 col-md-6"><a class="text-reset" href="post.html"><img class="mb-4"
                            src="img/headphone.png" alt="" height="150">
                        <h3 class="h5">Headphones</h3>
                        <p class="text-sm text-muted">Elit ad est labore irure qui.</p>
                    </a></div>
            </div>
        </div>
    </section>
    <!-- Subscribe section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6 position-relative py-4"><img class="subscribe-img" src="img/subscribe-img-1.jpg"
                        alt=""><img class="subscribe-img" src="img/subscribe-img-2.jpg" alt="">
                </div>
                <div class="col-lg-6">
                    <h2>Best money saving - Travel tips</h2>
                    <p class="text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos quidem
                        facere aliquam, delectus, incidunt ipsum fugit deserunt ducimus quibusdam consequuntur quos
                        numquam ipsa suscipit animi dolore. Est beatae inventore voluptas.</p>
                    <form action="#">
                        <div class="row gy-3 gy-lg-0">
                            <div class="col-lg-8">
                                <input class="form-control" type="email" name="email"
                                    placeholder="Enter your email address">
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-dark btn-block" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Top categories section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <header class="mb-5 text-center">
                <h2>Top categories</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </header>
            <div class="row text-center gy-4">
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#food-1"> </use>
                        </svg>
                        <h3 class="h5">Restaurants</h3>
                        <p class="text-muted text-sm">Restaurants Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#paper-bag-1"> </use>
                        </svg>
                        <h3 class="h5">Markets</h3>
                        <p class="text-muted text-sm">Markets Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#special-price-1"> </use>
                        </svg>
                        <h3 class="h5">Low budget</h3>
                        <p class="text-muted text-sm">Low budget Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#movie-camera-1"> </use>
                        </svg>
                        <h3 class="h5">Cinemas</h3>
                        <p class="text-muted text-sm">Cinemas Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#beach-1"> </use>
                        </svg>
                        <h3 class="h5">Beaches</h3>
                        <p class="text-muted text-sm">Beaches Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#camping-1"> </use>
                        </svg>
                        <h3 class="h5">Camping</h3>
                        <p class="text-muted text-sm">Camping Destinations</p>
                    </a></div>
            </div>
        </div>
    </section>
    <!-- Sponsors section-->
    <section class="py-5">
        <div class="container py-4">
            <header class="text-center mb-4">
                <h2>Our sponsors</h2>
            </header>
            <!-- Brands -->
            <div class="swiper sponsors-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide h-auto"><a href="#!"><img class="d-block mx-auto my-3 sponsor"
                                src="img/brand-1.svg" alt=""></a></div>
                    <div class="swiper-slide h-auto"><a href="#!"><img class="d-block mx-auto my-3 sponsor"
                                src="img/brand-2.svg" alt=""></a></div>
                    <div class="swiper-slide h-auto"><a href="#!"><img class="d-block mx-auto my-3 sponsor"
                                src="img/brand-3.svg" alt=""></a></div>
                    <div class="swiper-slide h-auto"><a href="#!"><img class="d-block mx-auto my-3 sponsor"
                                src="img/brand-4.svg" alt=""></a></div>
                    <div class="swiper-slide h-auto"><a href="#!"><img class="d-block mx-auto my-3 sponsor"
                                src="img/brand-5.svg" alt=""></a></div>
                    <div class="swiper-slide h-auto"><a href="#!"><img class="d-block mx-auto my-3 sponsor"
                                src="img/brand-6.svg" alt=""></a></div>
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
