@extends('frontend.master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.alert').delay(5000).slideUp(300);
            $('#commentForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "/save-comment",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('#commentForm')[0].reset(); // Reset form fields

                            // Redirect to the 'home' route after 1 second
                            setTimeout(function() {
                                window.location.href =
                                    "{{ route('post.show', ['id' => $post->id]) }}";
                            }, 1000);
                        } else {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        var errorMessage = "An error occurred while processing your request.";
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON;
                            if (errors && errors.error) {
                                errorMessage = errors.error;
                            }
                        }
                        toastr.error(errorMessage);
                    }
                });
            });
        });
    </script>



    <section class="py-5">
        <div class="container text-center">
            @if ($post)
                <p class="h6 mb-0 text-uppercase text-primary">{{ $post->category->name }}</p>
                <h1>{{ $post->title }}</h1>
                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis aliquid</p>
                <ul class="list-inline small text-uppercase mb-0">
                    <li class="list-inline-item align-middle"><img src="{{ asset('upload') . '/' . $post->photo }}"
                            alt="Photo" width="40%" height="10%" /></li>
                    <p>
                        <li class="list-inline-item me-0 text-muted align-middle">By </li>
                        <li class="list-inline-item align-middle me-0"><a class="fw-bold reset-anchor"
                                href="#!">{{ $post->author }}</a></li>
                    </p>
                    <li class="list-inline-item text-muted align-middle me-0">|</li>
                    <li class="list-inline-item text-muted align-middle me-0">
                        {{ $post->created_at->format('Y-m-d') }} || {{ $post->created_at->format('H:i:s') }}
                    </li>
                    <li class="list-inline-item text-muted align-middle me-0">|</li>
                </ul>

        </div>
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    <p class="lead first-letter-styled lh-4">{{ $post->desc }}.</p>
                    <div class="px-lg-5 mb-5">
                        <blockquote class="blockquote-custom">{{ $post->desc }}.</blockquote>
                    </div>
                @else
                    <p>Post not found.</p>
                    @endif
                    <h3 class="h4 mb-4">Leave a comment</h3>
                    @auth
                        <form class="mb-5" id="commentForm">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="row gy-3">
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="name"
                                        placeholder="Full Name e.g. Jason Doe">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="email" name="email"
                                        placeholder="Email Address e.g. Jason@email.com">
                                </div>
                                <div class="col-lg-12">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Leave your message"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-dark" type="submit">Submit your comment</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <h3 class="h4 mb-4 d-flex align-items-center"><a href="{{ route('loginClient') }}">Login to comment
                                here
                        </h3>
                    @endauth

                    <h3 class="h4 mb-4 d-flex align-items-center"><span>Comments</span><span
                            class="text-sm ms-3 text-gray">- {{ count($comments) }} Comments</span></h3>

                    @foreach ($comments as $comment)
                        <ul class="list-unstyled comments">
                            <li>
                                <div class="d-flex mb-4">
                                    <div class="pe-2 flex-grow-1" style="width: 75px; min-width: 75px;"><img
                                            class="rounded-circle shadow-sm img-fluid img-thumbnail" src="/img/person-1.jpg"
                                            alt="" /></div>
                                    <div class="ps-2">
                                        <p class="small mb-0 text-primary">{{ $comment->created_at->format('Y-m-d') }} ||
                                            {{ $comment->created_at->format('H:i:s') }}</p>
                                        <h5>{{ $comment->name }} </h5>
                                        <p class="text-muted text-sm mb-2">{{ $comment->message }}</p><a
                                            class="reset-anchor text-sm" href="#!"><i
                                                class="fas fa-share me-2 text-primary"></i><strong>Reply</strong></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endforeach


                    {{-- <ul class="list-unstyled">
                        <li>
                            <div class="d-flex mb-4">
                                <div class="pe-2 flex-grow-1" style="width: 75px; min-width: 75px;"><img
                                        class="rounded-circle shadow-sm img-fluid img-thumbnail" src="/img/person-2.jpg"
                                        alt="" /></div>
                                <div class="ps-2">
                                    <p class="small mb-0 text-primary">19 Sep 2019</p>
                                    <h5>Melissa Johanson</h5>
                                    <p class="text-muted text-sm mb-2">Lorem ipsum dolor sit amet, consetetur
                                        sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                        dolore magna aliquyam erat, sed diam voluptua. At.</p><a
                                        class="reset-anchor text-sm" href="#!"><i
                                            class="fas fa-share me-2 text-primary"></i><strong>Reply</strong></a>
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="d-flex mb-4">
                                <div class="pe-2 flex-grow-1" style="width: 75px; min-width: 75px;"><img
                                        class="rounded-circle shadow-sm img-fluid img-thumbnail" src="/img/person-3.jpg"
                                        alt="" /></div>
                                <div class="ps-2">
                                    <p class="small mb-0 text-primary">10 Oct 2019</p>
                                    <h5>David Nguyen</h5>
                                    <p class="text-muted text-sm mb-2">Lorem ipsum dolor sit amet, consetetur
                                        sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                        magna aliquyam erat, sed diam voluptua. At.</p><a class="reset-anchor text-sm"
                                        href="#!"><i
                                            class="fas fa-share me-2 text-primary"></i><strong>Reply</strong></a>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                </div>
                <div class="col-lg-4">
                    <!-- About me widget -->
                    <div class="mb-5 text-center"><img class="mb-3 rounded-circle img-thumbnail shadow-sm"
                            src="/img/author.jpg" alt="" width="110">
                        <h3 class="h4">About me</h3>
                        <p class="text-sm text-muted px-sm-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod.</p><img class="d-block mx-auto mb-3" src="/img/signature.png" alt=""
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
                    <div class="mb-5">
                        <h3 class="h5">Latest posts</h3>
                        <p class="text-sm text-muted mb-4">Lorem ipsum dolor sit, consectetur adipisicing elit, sed do
                            eiusmod.</p>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-1"><a href="post.html"><img src="/img/recent-posts-thumb-1.jpg"
                                        alt="" width="80"></a>
                                <div class="media-body ms-3">
                                    <p class="small text-primary text-uppercase mb-0">5 Aug 2018</p>
                                    <h6 class="mb-1"><a class="reset-anchor" href="post.html">The top climbing
                                            tours</a></h6>
                                    <p class="small text-muted">Lorem ipsum dolor sit, consectetur adipisicing elit,
                                        sed.</p>
                                </div>
                            </li>
                            <li class="d-flex mb-1"><a href="post.html"><img src="/img/recent-posts-thumb-2.jpg"
                                        alt="" width="80"></a>
                                <div class="media-body ms-3">
                                    <p class="small text-primary text-uppercase mb-0">5 Aug 2018</p>
                                    <h6 class="mb-1"><a class="reset-anchor" href="post.html">Travel guide to
                                            Canada</a></h6>
                                    <p class="small text-muted">Lorem ipsum dolor sit, consectetur adipisicing elit,
                                        sed.</p>
                                </div>
                            </li>
                            <li class="d-flex mb-1"><a href="post.html"><img src="/img/recent-posts-thumb-3.jpg"
                                        alt="" width="80"></a>
                                <div class="media-body ms-3">
                                    <p class="small text-primary text-uppercase mb-0">5 Aug 2018</p>
                                    <h6 class="mb-1"><a class="reset-anchor" href="post.html">A day in Tailand</a>
                                    </h6>
                                    <p class="small text-muted">Lorem ipsum dolor sit, consectetur adipisicing elit,
                                        sed.</p>
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
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-1.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-2.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-3.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-4.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-5.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-6.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-8.jpg"
                                            alt=""></div>
                                </a></div>
                            <div class="col-3"><a class="instagram-item overlay-hover-dark-sm d-block w-100"
                                    href="#!">
                                    <div class="overlay-content"><img class="img-fluid" src="/img/instagram-1.jpg"
                                            alt=""></div>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript files-->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/js/front.js"></script>
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
