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
            <!-- post comments -->
            <div class="section-row">
                <div class="section-title">
                    <h3 class="title">3 Комментария</h3>
                </div>
                <div class="post-comments">
                    <!-- comment -->
                    <div class="media">
                        <div class="media-left">
                          
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <h4>John Doe</h4>
                                <span class="time">5 min ago</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                            <!-- comment -->
                            <div class="media media-author">
                                <div class="media-left">
                                    
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">5 min ago</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                                </div>
                            </div>
                            <!-- /comment -->
                        </div>
                    </div>
                    <!-- /comment -->

                    <!-- comment -->
                    <div class="media">
                        <div class="media-left">
                            
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <h4>John Doe</h4>
                                <span class="time">5 min ago</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <!-- /comment -->
                </div>
            </div>
            <!-- /post comments -->

            <!-- post reply -->
            <div class="section-row">
                <div class="section-title">
                    <h3 class="title">Оставьте комментарий</h3>
                </div>
                <form method="POST" action="{{route('commentStore')}}" role="form">
                    @csrf 
                    <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="Сообщение"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <input class="form-control" type="text" name="name" placeholder="Ваше имя">
                        </div>
                        <div class="form-group col-6">
                            <div class="row justify-content-start">
                                <div class="col-3">
                                    <span class="captcha">{!! captcha_img() !!}</span>
                                    <span class="btn btn-outline-info btn-refresh"><i class="fas fa-sync-alt"></i></span>
                                </div>
                                <div class="col-9">
                                    <input id="captcha" class="form-control" type="text" name="captcha" placeholder="Введите код проверки">
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