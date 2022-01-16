@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            {{-- Logic game --}}
            <div class="col-sm-12 col-md-6 col-lg-4">    
                <div class="course-card">
                    <div class="course-card_img">
                        <img src="{{asset('assets/img/mini_logica.jpg')}}">
                    </div>
                    <div class="course-card_body">
                        <h5 class="course-card_title">Логика (Master mind)</h5>
                        <p class="course-card_text">Известная логическая игра на отгадывание последовательности цветов</p>
                        <p><a href="{{route('games.logica')}}" class="bluelink_button">Играть</a></p>
                    </div> 
                </div>
            </div>

            {{-- Arcanoid --}}
            <div class="col-sm-12 col-md-6 col-lg-4">    
                <div class="course-card">
                    <div class="course-card_img">
                        <img src="{{asset('assets/img/mini_arcanoid.jpg')}}">
                    </div>
                    <div class="course-card_body">
                        <h5 class="course-card_title">Арканоид</h5>
                        <p class="course-card_text">Классическая браузерная игра Арканоид. Разбей все цветные блоки, чтобы победить</p>
                        <p><a href="{{route('games.arcanoid')}}" class="bluelink_button">Играть</a></p>
                    </div> 
                </div>
            </div>

            {{-- Clic game --}}
            <div class="col-sm-12 col-md-6 col-lg-4">    
                <div class="course-card">
                    <div class="course-card_img">
                        <img src="{{asset('assets/img/mini_click.jpg')}}">
                    </div>
                    <div class="course-card_body">
                        <h5 class="course-card_title">Игра "Клик"</h5>
                        <p class="course-card_text">Проверь быстроту своего клика в веселой игре!</p>
                        <p><a href="{{route('games.clickgame')}}" class="bluelink_button">Играть</a></p>
                    </div> 
                </div>
            </div>
        </div>
    </div> 

@endsection