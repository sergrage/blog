<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="">



    <!-- Title -->
    <title>Шматовская Виктория - врач стоматолог-ортопед</title>

    <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

    <!-- Favicon -->
    <link rel="icon" href="/application/img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link href="{{ mix('application/css/app.css') }}" rel="stylesheet">

      <!-- Yandex map-->
  <script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAP_KEY') }}&lang=ru_RU" type="text/javascript">
    </script>

</head>

<body>


    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a href="index.html" class="original-logo"><img src="/application/img/core-img/logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between">

                                    <!-- Subscribe btn -->
                        <div class="subscribe-btn">
                            <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Портфолио</a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="{{route('posts')}}">Статьи</a></li>
                                    <li><a href="about-us.html">Обо мне</a></li>
                                    <li><a href="#">Вопрос/Ответ</a></li>
                                    <li><a href="#">Отзывы</a></li>
                                    <li><a href="{{ route('contacts') }}">Записаться на прием</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


@yield('content')

<footer class="footer-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ mix('application/js/app.js') }}"></script>
    <!-- ##### Footer Area End ##### -->
</body>

</html>

@yield('captcha')