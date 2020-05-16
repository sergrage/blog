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
                                    <a href="">г. Петрозаводск</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container ck-content1">
            <div class="row">
                <div class="col-12">
                    @isset($about)
                        {!! addBootstrap($about->body) !!}
                    @endisset

                    @empty($about)
                        <h3>Биография не добавлена на сайт</h3>
                    @endempty
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            @foreach($about->photos as $image)
            <div class="col-md-3">
                <a data-fancybox="images" href="{{ $image->path}}" ><img src="{{ $image->path}}" width="300px" class="p-2 img-fluid"></a>
            </div>
            @endforeach
            </div>
        </div>
     </div>
    </div>
    <hr>
@endsection