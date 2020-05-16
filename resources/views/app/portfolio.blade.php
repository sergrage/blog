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
        
         <div class="container p-3">
            <h2 style="color:#878787">{{ $portfolio->title }}</h2>
            <div class="row">

            @foreach($portfolio->photos as $image)
            <div class="col-md-3 pt-4">
                <a data-fancybox="images" href="{{ $image->path}}" ><img src="{{ $image->path}}" width="300px" class="p-2 img-fluid"></a>
            </div>
            @endforeach
            </div>
        </div>
        <div class="container ck-content1 p-3">
            <div class="row">
                <div class="col-12">
                    
                    <div class="pt-4">
                        {!! addBootstrap($portfolio->body) !!}    
                    </div>
                </div>
            </div>
            <a class="btn original-btn" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
        </div>
       
     </div>
    </div>
    <hr>

@endsection