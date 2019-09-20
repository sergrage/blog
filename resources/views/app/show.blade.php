@extends('layouts.app')
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        
        <div class="hero-slides">
           
            <div class="single-hero-slide bg-img" style="background-image: url({{$post->image}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="slide-content text-center">
                                <div class="post-tag">
                                    <a href="#">
                                        @foreach($post->tags as $tag)
                                            {{$tag->name}} @if (!$loop->last) | @endif
                                        @endforeach
                                    </a>
                                </div>
                                <h2><a href="single-post.html">{{$post->title}}</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-50 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="ck-content1">
                        {!!$post->body!!}
                    </div>
                </div>
                <!-- ##### Sidebar Area ##### -->
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
    <hr>
@endsection