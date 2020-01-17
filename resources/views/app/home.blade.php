@extends('layouts.app')
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides">
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(/application/img/bg-img/b2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="slide-content text-center">
                                <div class="post-tag">
                                    <a href="">Врач стоматолог-ортопед</a>
                                </div>
                                <h2><a href="">Шматовская Виктория Викторовна</a></h2>

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
    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <span class="post-tag">Обо мне</span>
                            <h4><span class="post-headline no-after">Врач стоматолог-ортопед Шматовская Виктория Викторовна</span></h4>
                            <p>Здравствуйте, меня зовут Виктория. Я врач стоматолог-ортопед со стажем работы более 10 лет. Я веду прием и работаю в г. Петрозаводске.</p>
                        <!--     <img src="application/img/victoriaShmatovskaya.jpg" alt=""> -->
                            <a href="#" class="btn original-btn">Далее</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="application/img/blog-img/1.jpg" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="{{route('contacts')}}">Запись на прием</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="application/img/blog-img/2.jpg" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="{{route('questions')}}">Задать вопрос доктору</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Single Blog Area  -->
<!--                     <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="application/img/blog-img/3.jpg" alt="">
                                    <div class="post-date">
                                        <a href="#">12 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Lifestyle</a>
                                    <h4><a href="#" class="post-headline">Party people in the house</a></h4>
                                    <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                    <div class="post-meta"><p>3 Комментария</p></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="application/img/blog-img/4.jpg" alt="">
                                    <div class="post-date">
                                        <a href="#">12 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Lifestyle</a>
                                    <h4><a href="#" class="post-headline">We love colors in 2018</a></h4>
                                    <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                    <div class="post-meta"><p>3 Комментария</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1000ms">
                        <div class="row">
                            <div class="col-12">
                                <div class="single-blog-thumbnail">
                                    <img src="application/img/blog-img/7.jpg" alt="">
                                    <div class="post-date">
                                        <a href="#">10 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-blog-content mt-50">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Lifestyle</a>
                                    <h4><a href="#" class="post-headline">10 Tips to organize the perfect party</a></h4>
                                    <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                    <div class="post-meta"><p>3 Комментария</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="application/img/blog-img/5.jpg" alt="">
                                    <div class="post-date">
                                        <a href="#">12 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Lifestyle</a>
                                    <h4><a href="#" class="post-headline">Party people in the house</a></h4>
                                    <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                    <div class="post-meta"><p>3 Комментария</p></div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    @foreach($posts as $post)
                    <div class="single-blog-area blog-style-2 mb-50">
                        <div class="row align-items-center">
                            <div class="
                                @if($loop->index == 2) 
                                    col-12
                                @else
                                    col-12 col-md-6
                                @endif
                            ">
                                <div class="single-blog-thumbnail">
                                    <img src="{{ $post->image }}" alt="{{ $post->imageAlt }}">
                                </div>
                            </div>
                            <div class="
                                @if($loop->index == 2) 
                                    col-12
                                @else
                                    col-12 col-md-6
                                @endif
                            ">
                                <div class="single-blog-content">
                                    @if($loop->index == 3) 
                                    
                                    @else
                                    <div class="line"></div>
                                    @endif
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
                    @endforeach
                </div>

                <!-- ##### Sidebar Area ##### -->

            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
    <hr>
@endsection
