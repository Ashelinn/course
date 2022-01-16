@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
    {{-- Заголовок сайта --}}
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-9 col-sm-12">
                    {{-- Главный заголовок сайта --}}
                    <h1>Научись делать игры вместе с нами</h1>
                    <p class="main-subtitle">Изучите возможности Java Script для создания игр вместе с наставниками из компаний мирового уровня</p>
                    {{-- Особенности курса --}}
                    <div class="main-features">
                        <div class="main-features_item">
                            <img src="{{asset('assets/img/tick.svg')}}" alt="галочка">
                            <p class="main-features_paragraf">Гибкий</p>
                        </div>
                        <div class="main-features_item">
                            <img src="{{asset('assets/img/tick.svg')}}" alt="галочка">
                            <p class="main-features_paragraf">Путь обучения</p>
                        </div>
                        <div class="main-features_item">
                            <img src="{{asset('assets/img/tick.svg')}}" alt="галочка">
                            <p class="main-features_paragraf">Сообщество</p>
                        </div>
                    </div>
                    {{-- Начать курс --}}
                    <div class="main-learn">
                        {{-- Вывод названий курсов --}}
                        
                        <form action="{{route('course.choiseCourse')}}" class="main-form">
                            <div >
                                <label for="course">Что ты хочешь изучить сегодня?</label>
                                <select name="category_id" id="category_id">
                                    <option value="0" disabled>Выберите</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div>
                                <button type="submit" class="main-form_button">Начать</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
                {{-- Главная картинка --}}
                <div class="col-lg-5 col-md-3 d-none d-sm-block">
                    <img src="{{asset('assets/img/main2.png')}}" alt="изображение">
                </div>
            </div>
        </div>
    </section>

    {{-- Блок Изучаемые технологии --}}
    <section class="technologies">
        <div class="container">
            {{-- Логотипы --}}
            <h3 class="technologies-title">Изучаемые технологии</h3>
            <div class="technologies-logo">
                <img src="{{asset('assets/img/html.png')}}" alt="html" class="technologies-logo_img">
                <img src="{{asset('assets/img/css.png')}}" alt="css" class="technologies-logo_img">
                <img src="{{asset('assets/img/js.png')}}" alt="java script" class="technologies-logo_img">
                <img src="{{asset('assets/img/canvas.png')}}" alt="canvas" class="technologies-logo_img">
                <img src="{{asset('assets/img/jQ.png')}}" alt="jQuery" class="technologies-logo_img">
            </div>
        </div>
    </section>

    {{-- Блок Преподаватели --}}
    <section class="mentors">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h2 class="mentors-title">Познакомьтесь с нашими преподавателями</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    {{-- mentor 1 --}}
                    <div class="mentors-img">
                        <img src="{{asset('assets/img/mentors/Gates.jpg')}}" alt="Bill Gates">
                    </div>
                    <div class="mentors-text">
                        <h3>Билл Гейтс</h3>
                        <p>Один из создателей компании Microsoft</p>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    {{-- mentor 2 --}}
                    <div class="mentors-img">
                        <img src="{{asset('assets/img/mentors/Kaspersky.jpg')}}" alt="Evgeny Kaspersky">
                    </div>
                    <div class="mentors-text">
                        <h3>Евгений Касперский</h3>
                        <p>Cпециалист в сфере информационной безопасности</p>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    {{-- mentor 3 --}}
                    <div class="mentors-img">
                        <img src="{{asset('assets/img/mentors/Straustrup.jpg')}}" alt="Strausstrup">
                    </div>
                    <div class="mentors-text">
                        <h3>Бьёрн Страуструп</h3>
                        <p>Автор языка программирования C++</p>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    {{-- mentor 4 --}}
                    <div class="mentors-img">
                        <img src="{{asset('assets/img/mentors/Segalovich.jpg')}}" alt="Bill Gates">
                    </div>
                    <div class="mentors-text">
                        <h3>Илья Сегалович</h3>
                        <p>Один из сооснователей «Яндекс»</p>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    {{-- mentor 5 --}}
                    <div class="mentors-img">
                        <img src="{{asset('assets/img/mentors/Zukerberg.jpg')}}" alt="Evgeny Kaspersky">
                    </div>
                    <div class="mentors-text">
                        <h3>Марк Цукерберг</h3>
                        <p>создатель Facebook</p>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    {{-- mentor 6 --}}
                    <div class="mentors-img">
                        <img src="{{asset('assets/img/mentors/Torvaldc.jpg')}}" alt="Strausstrup">
                    </div>
                    <div class="mentors-text">
                        <h3>Линус Торвальдс</h3>
                        <p>Cоздал Linux</p>
                    </div>
                </div>
            </div>
            {{-- --}}
        </div>    
    </section>

    {{-- Блок подписка --}}
    <section class="subscribe" id="subscribe">
        <div class="container">
            <div class="row">
                <div class="subscribe-wrap">
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="subscribe-title">
                            Новостная рассылка
                        </h3>
                        <p class="subscribe-text">
                            Подпишитесь на нашу рассылку для скидок, акций и многого другого
                        </p>
                    </div>
    
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <form action="">
                            <input type="text" placeholder="Your Email*" class="subscribe-input">
                            <button type="submit" class="subscribe-button">Подписаться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Блок Отзывы --}}
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h2 class="testimonial-title">Что говорят наши студенты</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                    {{-- 1 --}}
                    <div class="testimonial-card">
                        {{-- quotes --}}
                        <div class="testimonial-quote">
                            <img src="{{asset('assets/img/quotes.svg')}}" alt="quotes">
                        </div>
                        {{-- testimonial --}}
                        <div class="testimonial-card_student">
                            <div class="testimonial-card_img">
                                <img src="{{asset('assets/img/students/Vorobei.jpeg')}}" alt="Capitan Jack Sparrow">
                            </div>
                            <div class="testimonial-card_title">
                                <h3>Джек Воробей</h3>
                                <p>Капитан</p>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae totam dolores, facere suscipit eos, aliquam temporibus optio soluta minus iusto, quae sed. Ut facere possimus, voluptates facilis tempore, perspiciatis aspernatur officia enim cupiditate delectus odio quas ab quo numquam eum laborum ex recusandae totam!
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                    {{-- 2 --}}
                    <div class="testimonial-card">
                        {{-- quotes --}}
                        <div class="testimonial-quote">
                            <img src="{{asset('assets/img/quotes.svg')}}" alt="quotes">
                        </div>
                        {{-- testimonial --}}
                        <div class="testimonial-card_student">
                            <div class="testimonial-card_img">
                                <img src="{{asset('assets/img/students/Woman.jpg')}}" alt="Wonder woman">
                            </div>
                            <div class="testimonial-card_title">
                                <h3>Диана Принс</h3>
                                <p>Супергерой</p>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, cupiditate natus. Consequuntur dolor quibusdam facilis natus sapiente tenetur officiis quia excepturi tempora atque amet impedit minus, recusandae odio quaerat aliquam.
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                    {{-- 3 --}}
                    <div class="testimonial-card">
                        {{-- quotes --}}
                        <div class="testimonial-quote">
                            <img src="{{asset('assets/img/quotes.svg')}}" alt="quotes">
                        </div>
                        {{-- testimonial --}}
                        <div class="testimonial-card_student">
                            <div class="testimonial-card_img">
                                <img src="{{asset('assets/img/students/atom.jpg')}}" alt="Robot Atom">
                            </div>
                            <div class="testimonial-card_title">
                                <h3>Атом</h3>
                                <p>Робот</p>
                            </div>
                        </div>
                        <div class="testimonial-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem tempore officia necessitatibus doloribus minima eum, ipsam quisquam suscipit ab ea earum saepe ad iure incidunt non quasi excepturi iusto distinctio.
                        </div>
                    </div>
                </div>
        </div>   
    </section>

@endsection

