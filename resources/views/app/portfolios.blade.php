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
                @foreach($portfolios as $portfolio)
                <div class="col-6">
                    <div class="card">
                        <img class="card-img-top" src="{{$portfolio->photos[0]->path}}" alt="{{ $portfolio->photos[0]->alt }}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $portfolio->title }}</h5>
                           <div class="card-body">
                            <a href="{{ route('portfolio', $portfolio->id) }}" class="btn original-btn">Подробнее</a>
                          </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($portfolios->isEmpty())
                <div class="slide-content text-center">
                    <h2>Увы, пока портфолио пустое</h2>
                </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
@endsection