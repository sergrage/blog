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
                                    <a href="">
                                        @foreach($post->tags as $tag)
                                            {{$tag->name}} @if (!$loop->last) | @endif
                                        @endforeach
                                    </a>
                                </div>
                                <h2><a href="">{{$post->title}}</a></h2>
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
                    <div class="ck-content1">
                        {!! addBootstrap($post->body) !!}
                    </div>
                </div>
                <!-- ##### Sidebar Area ##### -->
            </div>
            <!-- post comments -->
        @include('app.partials.comments') 
            <!-- /post comments -->

            <!-- post reply -->
            <div class="section-row">
                <div class="section-title">
                    <h3 class="title">Оставьте комментарий</h3>
                </div>
                <form method="POST" action="{{route('commentStore')}}" role="form" id="formBottom">
                    @csrf 
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">

                        <textarea class="form-control" name="comment" placeholder="Сообщение"></textarea>
                        @if ($errors->has('comment'))
                          <span class="invalid-feedback d-block">
                              <strong>{{ $errors->first('comment') }}</strong>
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
            
    <!-- /post reply -->
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