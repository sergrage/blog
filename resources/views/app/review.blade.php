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
            <div class="row pb-5">
                <div class="col-12">
                    @if (session('success'))
                    <div class="alert alert-success mt-lg-4" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <!-- ##### Sidebar Area ##### -->
            </div>
            <!-- review form -->
            <div class="section-row">
                <div class="section-title">
                    <h3 class="title">Оставьте отзыв</h3>
                </div>
                <form method="POST" action="{{route('reviewStore')}}" role="form" id="formBottom">
                    @csrf 
                    <div class="form-group">

                        <textarea class="form-control" name="review" placeholder="Отзыв"></textarea>
                        @if ($errors->has('review'))
                          <span class="invalid-feedback d-block">
                              <strong>{{ $errors->first('review') }}</strong>
                          </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <input class="form-control" type="text" name="name" placeholder="Ваше имя">
                            @if ($errors->has('name'))
                              <span class="invalid-feedback d-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <div class="row justify-content-start">
                                <div class="col-3">
                                    <span class="captcha btn-refresh">{!! captcha_img() !!}</span>
                                    <!-- <span class="btn btn-outline-info btn-refresh"><i class="fas fa-sync-alt"></i></span> -->
                                </div>
                                <div class="col-9">
                                    <div class="custom-control">
                                    <input id="captcha" class="form-control" type="text" name="captcha" placeholder="Введите код проверки">
                                    @if ($errors->has('captcha'))
                                      <span class="invalid-feedback d-block">
                                          <strong>{{ $errors->first('captcha') }}</strong>
                                      </span>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>

            @if($reviewsProvenCount)
    <div class="section-row">
        <div class="section-title">
            <h3 class="title">{{ $reviewsProvenCount }} {{ true_wordform($reviewsProvenCount, 'Отзывов', 'Отзыв', 'Отзыва', 'Отзывов') }}</h3>
        </div>
        <div class="post-comments">
            @foreach($reviews as $review)
                @if($review->status == 'active')
            <!-- comment -->
            <div class="media">
                <div class="media-left">
                  
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h4>{{$review->name}}</h4>
                        <span class="time">{{$review->createdAtForHumans()}}</span>
                    </div>
                    <p>{{$review->text}}</p>
                    @if($review->answer)
                    <!-- comment -->
                    <div class="media media-author">
                        <div class="media-left">
                            
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <h4>Виктория</h4>
                                <span class="time">{{$review->answeredAtForHumans()}}</span>
                            </div>
                            <p>{{$review->answer}}</p>

                        </div>
                    </div>
                    @endif
                    <!-- /comment -->
                </div>
            </div>
            @endif
            <!-- /comment -->
            @endforeach
        </div>
    </div>
    @endif
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
    

@endsection

@section('captcha')

<script>
    
$('.btn-refresh').click(function(){
    $.ajax({
        type:'GET',
        url:'comment/refreshCaptcha',

        success:function(data) {
            $('.captcha').html(data.captcha);

        }
   });
});

</script>

@endsection