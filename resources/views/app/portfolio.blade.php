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
            <h3 style="color:#878787" class="pb-5 text-center headerLine ">{{ $portfolio->title }}</h3>
            <div class="row">

            @foreach($portfolio->photos as $image)
            <div class="col-md-3 pt-3">
                <a data-fancybox="images" href="{{ $image->path}}" ><img src="{{ $image->path}}" class="img-fluid" alt="{{ $image->alt }}"></a>
            </div>
            @endforeach
            <hr>
            </div>
        </div>
        <div class="container ck-content1 p-3">
            <div class="row">
                <div class="col-12">
                    <div class="pt-4">
                        <hr>
                        {!! addBootstrap($portfolio->body) !!}    
                    </div>
                    <a class="btn original-btn mt-5" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
                </div>
            </div>
        </div>
       
     </div>
     
    <hr>

@endsection