<!DOCTYPE html>
<html lang="ru">
<head>

    {{-- meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">

    {{-- styles --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/logic-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/click-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/about-style.css')}}">

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- scripts --}}
    <link type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}">
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    {{-- favicon --}}
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">

    <title>JS course</title>
</head>


<body>
    @section('menu')
        {{-- HEADER --}}
        <header>
            <div class="container">
                {{-- NAV --}}
                <nav>
                    {{-- logo --}}
                    <div class="header-logo">
                        <a href="{{route('home.index')}}"><img src="{{asset('assets/img/logo.svg')}}" alt="logo"></a>
                    </div>
                
                    {{-- main menu --}}
                    <div class="header-main">
                        <div class="header-wrap">
                            <ul class="header-menu">
                                {{-- Home page --}}
                                <li class="header-menu__item">
                                    <a href="{{route('home.index')}}" class="blacklink {{($page == 'Home') ? ' active' : '';}}">Главная</a>
                                </li>

                                {{-- Course page --}} 
                                <li class="header-menu__item">
                                    <a href="{{route('course.index')}}" class="blacklink {{($page == 'Courses') ? ' active' : '';}}">Уроки</a>
                                </li>

                                {{-- Mentor page --}}
                                <li class="header-menu__item">
                                    <a href="{{route('mentor.index')}}" class="blacklink {{($page == 'Mentors') ? ' active' : '';}}"> Преподаватели </a>
                                </li>                        

                                {{-- Admin or Games page --}}
                                @if (!Auth::guest() && Auth::user()->role_id == 1)
                                    <li class="header-menu__item">
                                        <a href="{{route('admin.index')}}" class="blacklink {{($page == 'Admin') ? ' active' : '';}}"> Админка </a>
                                    </li>
                                @else 
                                    <li class="header-menu__item">
                                        <a href="{{route('games.index')}}" class="blacklink {{($page == 'Game') ? ' active' : '';}}"> Игры </a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        {{-- login and register --}}
                        <div class="right">
                            <ul class="header-menu">
                            @if(Auth::guest())
                                <li class="header-menu__item">
                                    <a href="{{route('login.page')}}" class="bluelink">Войти</a>
                                </li>
                        
                                <li class="header-menu__item">
                                    <a href="{{route('register.page')}}" class="header-menu__button">Регистрация</a>
                                </li>
                            @else
                                {{-- user's menu --}}
                                <li class="header-menu__item">
                                    <a href="{{route('login')}}" class="bluelink" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name}}</a>
                                </li>
                                    
                                <li class="header-menu__item">
                                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <a href="{{route('logout')}}" class="header-menu__button"
                                    onclick="event.preventDefault();{this.closest('form').submit();}">Выход</a>
                                    </form>
                                </li>
                            @endif
                            </ul>
                        </div>
                    </div>

                    {{-- Burger menu --}}
                    <div class="burger-menu">
                        <span></span>
                    </div>
                </nav>
            </div>

            {{-- Burger script --}}
            <script type="text/javascript" src="{{asset('assets/js/burger-script.js')}}"></script>
        </header>
        
        {{-- Main content --}}
        @show
        @yield('content')

        {{-- Footer --}}
        <footer>
            <div class="container container-sm">
                <div class="row">
                    {{-- Logo and social networks --}}
                    <div class="col-lg-4 col-sm-12">
                        <img src="{{asset('assets/img/footer-logo.svg')}}" alt="footer-logo" class="footer-logo">
                        <p class="footer-slogan">
                            Повышайте уровень своих навыков и получайте работу своей мечты...
                        </p>
                        <div class="footer-icon">
                            <a href="https://www.instagram.com/p/CAxT6rSA5Ts/">
                                <img src="{{asset('assets/img/Insta.svg')}}" alt="Instagram">
                            </a>
                            
                            <a href="https://htmlacademy.ru/">
                                <img src="{{asset('assets/img/Social.svg')}}" alt="Social">
                            </a>
                            
                            <a href="https://twitter.com/htmlacademy_ru">
                                <img src="{{asset('assets/img/Twitter.svg')}}" alt="Twitter">
                            </a>
                            
                            <a href="https://www.youtube.com/user/htmlacademyru">
                                <img src="{{asset('assets/img/Youtube.svg')}}" alt="Youtube">
                            </a>
                        </div>
                    </div>

                    {{-- About company --}}
                    <div class="col-lg-2 col-sm-12">
                        <h4>Компания</h4>
                        <p><a href="{{route('home.create')}}" class="footer-link">О нас</a></p>
                        <p><a class="footer-link">Блог</a></p>
                        <p><a href="{{route('home.create')}}" class="footer-link">Связаться с нами</a></p>
                        <p><a href="{{asset('assets/documents/Прайс.pdf')}}" class="footer-link">Ценообразование</a></p>
                        <p><a class="footer-link">Отзывы</a></p>
                    </div>

                    {{-- Support --}}
                    <div class="col-lg-3 col-sm-12">
                        <h4>Служба поддержки</h4>
                        <p><a href="#subscribe" class="footer-link">Центр помощи</a></p>
                        <p><a href="{{asset('assets/documents/Условия_обслуживания.pdf')}}" class="footer-link">
                            Условия обслуживания</a></p>
                        <p><a href="{{asset('assets/documents/Юридическая_информация.pdf')}}" class="footer-link">Юридическая информация</a></p>
                        <p><a href="{{asset('assets/documents/Политика_конфеденциальности.pdf')}}" class="footer-link">Полтика конфеденциальности</a></p>
                        <p><a href="#subscribe" class="footer-link">Статус</a></p>
                    </div>
                    
                    {{-- Send to e-mail --}}
                    <div class="col-lg-3 col-sm-12">
                        <h4>Будьте в курсе</h4>
                        <div class="footer-send">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="footer-send__input" placeholder="Your email address">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text footer-send__button" id="send"><img src="{{asset('assets/img/send.svg')}}"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer-copy">
                    Padalko Elena &copy; Kaliningrad 2021-2022
                </div>
            </div>
        </footer>
        
        {{-- Модальное окно --}}
        <div id="modal" class="modal_close">
            <div class="modal-content">
                <h3 class="modal-title">
                Поздравляем! Теперь вы подписаны на нашу рассылку
                </h3>
                <p class="modal-text">
                Надеемся, что наши материалы будут вам полезны. Будьте в курсе наших предложений и акций. Спасибо, что вы с нами!
                </p>
                <button id="close" class="blue_button">
                Закрыть
                </button>
            </div>
          </div>
        {{-- Скрипт для модального окна --}}
        <script type="text/javascript" src="{{asset('assets/js/modal.js')}}"></script>
</body>
</html>