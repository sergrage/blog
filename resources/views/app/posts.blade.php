@extends('layouts.app')
@section('content')
<!--     <div class="hero-area">
        <div class="hero-slides">
            <div class="single-hero-slide bg-img" style="background-image: url(/application/img/bg-img/b2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="slide-content text-center">
                                <div class="post-tag">
                                    <a href="#">Врач стоматолог-ортопед</a>
                                </div>
                                <h2><a href="single-post.html">Шматовская Виктория Викторовна</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                    @foreach($posts as $post)
                <div class="col-6">
                    <div class="single-blog-area blog-style-2 mb-50">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="single-blog-thumbnail">
                                    <img src="{{ $post->image }}" alt="{{ $post->imageAlt }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Гигиена | Ортопедия | Виниры</a>
                                    <h4><a href="{{route('post.show', $post->slug)}}" class="post-headline">{{ $post->title }}</a></h4>
                                    <p>{{ $post->textPreview }}</p>
                                    <div class="post-meta"><p>3 Комментария</p><p>Опубликовано {{ $post->createdAtForHumans() }}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
    <hr>
@endsection