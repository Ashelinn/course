@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 140px;">
            <div class="col-12">
                <h3>Правила игры</h3>
                <p>
                    Цель игры — кликнуть по цветному кружочку и набрать максимальное количество очков.
                </p>
                <ul class="m-bottom-5">
                    <li>Кликайте только по цветным кружочкам. Каждый клик принесет вам 10 очков</li>
                    <li>Будьте внимательны, клик по черному кружочку отнимет 20 очков</li>
                    <li>Выберите комфортное время и начинайте игру</li>
                </ul>
            </div>

            <div class="col-12">
                <div class="body-game">
                <div class="screen">
                    <h1>CLICK Game</h1>
                    <a href="#" class="start-click" id="start-click">Начать игру</a>
                  </div>
              
                  <div class="screen">
                    <h1>Выберите время</h1>
                    <ul class="time-list" id="time-list">
                      <li>
                        <button class="time-btn" data-time="60">
                          Новичок: 60 сек
                        </button>
                      </li>
                      <li>
                        <button class="time-btn" data-time="40">
                          Любитель: 40 сек
                        </button>
                      </li>
                      <li>
                        <button class="time-btn" data-time="20">
                          Профи: 20 сек
                        </button>
                      </li>
                    </ul>
                  </div>
              
                  <div class="screen">
                    <h3>Осталось <span id="time">00:00</span></h3>
                    <h3>счет: <span id="score-click">0</span></h3>
                    <div class="board-click" id="board-click">
                    </div>
                    <div><button id="button_back">В начало</button></div>
                  </div>
                </div>
            </div>
                
            {{-- Скрипт игры --}}
            <script type="text/javascript" src="{{asset('assets/js/click-game.js')}}"></script>
        </div>
    </div> 

@endsection