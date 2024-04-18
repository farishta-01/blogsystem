@extends('frontend.master')

@section('content')
    <div class="content-align-center">
        <div class="row text-center">
            @foreach ($posts as $post)
                @if ($post->category->name === 'Medical Guide')
                    <div class="col-lg-6 mb-5">
                        <a href="post.html">
                            <img src="{{ asset('upload') . '/' . $post->photo }}" alt="Photo" width="265.33" height="259.99">
                        </a><br>
                        <ul class="list-inline">
                            <li class="list-inline-item me-0 text-gray align-middle">By </li>
                            <li class="list-inline-item align-middle me-0">
                                <a class="fw-bold reset-anchor" href="#!">{{ $post->author }}</a>
                            </li>
                            <li class="list-inline-item text-gray align-middle">|</li>
                            <li class="list-inline-item text-gray align-middle">{{ $post->created_at }}</li>
                        </ul>
                        <h3 class="h4 mt-2">
                            <a class="reset-anchor" href="post.html">{{ $post->title }}</a>
                        </h3>
                        <a class="reset-anchor text-gray text-uppercase small mb-2 d-block"
                            href="#!">{{ $post->category->name }}</a>
                        <p class="text-small mb-1">{{ $post->desc }}</p>
                        <a class="btn btn-link" href="index.html">Continue reading</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
