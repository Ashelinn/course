@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 140px;">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="result-message"></div>
                <div class="board">
                    <div class="flex-wrap">
                        <div id="wrap-prompt">
                            <div id="prompt-ten" class="line-flex"> </div>
                            <div id="prompt-nine" class="line-flex"> </div>
                            <div id="prompt-eight" class="line-flex"> </div>
                            <div id="prompt-seven" class="line-flex"> </div>
                            <div id="prompt-six" class="line-flex"> </div>
                            <div id="prompt-five" class="line-flex"> </div>
                            <div id="prompt-four" class="line-flex"> </div>
                            <div id="prompt-three" class="line-flex"> </div>
                            <div id="prompt-two" class="line-flex"> </div>
                            <div id="prompt-one" class="line-flex"> </div>
                        </div>

                        <div class="wrap">
                            <div id="hidden-colors">
                                <!-- вывод загаданных цветов -->
                            </div>
                            <!-- Линии попыток -->
                            <div id="line-ten" class="line-flex"> </div>
                            <div id="line-nine" class="line-flex"> </div>
                            <div id="line-eight" class="line-flex"> </div>
                            <div id="line-seven" class="line-flex"> </div>
                            <div id="line-six" class="line-flex"> </div>
                            <div id="line-five" class="line-flex"> </div>
                            <div id="line-four" class="line-flex"> </div>
                            <div id="line-three" class="line-flex"> </div>
                            <div id="line-two" class="line-flex"> </div>
                            <div id="line-one" class="line-flex"> </div>
                    </div>

                    <div id="button-wrap">
                            <!-- вывод кнопок -->
                            <div id="button-ten"> </div>
                            <div id="button-nine"> </div>
                            <div id="button-eight"> </div>
                            <div id="button-seven"> </div>
                            <div id="button-six"> </div>
                            <div id="button-five"> </div>
                            <div id="button-four"> </div>
                            <div id="button-three"> </div>
                            <div id="button-two"> </div>
                            <div id="button-one"> </div>
                    </div>
                    </div>

                    <div id="message">
                        <div class="line-flex">
                            доступные цвета:  
                            <div class="small_red small"></div>
                            <div class="small_orange small"></div>
                            <div class="small_yellow small"></div>
                            <div class="small_green small"></div>
                            <div class="small_blue small"></div>
                            <div class="small_violet small"></div>
                            <div class="small_pink small"></div>
                            <div class="small"></div>
                        </div>
                    </div>

                    <div class="line-flex fon">
                        <button id="start">СТАРТ</button>
                        <button id="stop">СДАТЬСЯ</button>
                    </div>
                </div>
            </div>
                
            {{-- Скрипт игры Логика --}}
            <script type="text/javascript" src="{{asset('assets/js/logic-game.js')}}"></script>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <h3>Правила игры</h3>
                <p>
                    Цель игры - угадать произвольную последовательность из четырех цветов.
                </p>
                <p>
                    Игрок начинает с произвольного выбора цветов. Для этого надо кликать по кружочку до появления нужного цвета. В игре доступно 7 цветов (цвета указаны в вверху игрового поля). Затем надо нажать на кнопку "отправить", чтобы получить ответ компьютера.
                </p>
                <p>                    
                    Компьютер отвечает следующим образом: отображает <b>белый</b> кружок для каждого правильно угаданного цвета, и <b>коричневый</b> кружок для каждого правильного цвета, помещенного на свое место. 
                </p>
                <p> 
                    Игрок получает информацию о количестве правильно расположенных цветов и количестве правильных цветов, оказавшихся не на своих местах. На основе этой информации игрок пробует угадать еще раз. Так продолжается определенное число попыток или до тех пор, пока игрок не угадает последовательность. 
                </p>
            </div>
    
        </div>
        <div class="m-bottom-5" style="height: 10px"></div>
    </div> 

@endsection