@extends('layouts.app')
@section('content')
        <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="hero-slides">
            <div class="single-hero-slide bg-img" style="background-image: url(/application/img/bg-img/b2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="slide-content text-center">
                                <div class="post-tag">
                                    <a href="#">Врач стоматолог-ортопед</a>
                                </div>
                                <h2><a href="#">Шматовская Виктория Викторовна</a></h2>
                                <div class="post-tag">
                                    <a href="#">г. Петрозаводск</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-12 col-md-6">
                    <div class="single-blog-area blog-style-2 mb-50">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="single-blog-thumbnail">
                                    <img src="{{ $post->image }}?{{time()}}" alt="{{ $post->imageAlt }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <!-- <a href="#" class="post-tag">Гигиена | Ортопедия | Виниры</a> -->
                                    @if($post->tags)
                                        @foreach($post->tags as $tag)
                                        @if($loop->last)
                                            <a href="/tag/{{$tag->name}}" class="post-tag d-inline-block"> {{ $tag->name }}</a>
                                        @else
                                        <a href="/tag/{{$tag->name}}" class="post-tag d-inline-block"> {{ $tag->name }}</a> <span class="post-tag d-inline-block">|</span>
                                       @endif
                                        @endforeach
                                    @endif
                                    <h4><a href="{{route('post.show', $post->slug)}}" class="post-headline">{{ $post->title }}</a></h4>
                                    <p>{{ $post->textPreview }}</p>
                                    <div class="post-meta"><p>{{$post->commentsProvenCount()}} {{ true_wordform($post->commentsProvenCount(), 'Комментариев', 'Комментарий', 'Комментария', 'Комментариев') }}</p><p>Опубликовано {{ $post->createdAtForHumans() }}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($posts->isEmpty())
                <div class="slide-content text-center">
                    <h2>Увы, пока статей нет!</h2>
                </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
@endsection