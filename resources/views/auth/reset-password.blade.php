@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
<?php $page="Home" ?>
    <div class="container">
        <div class="register-wrap">
            <h3>Страница создания нового пароля</h3>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="your e-mail" class="form-control form-control-lg">
                    @error('email')
                        {{$message}}
                    @enderror 
                    <br>
                </div>

                <div class="form-group">
                    <label for="password">Задайте пароль:</label>
                    <input type="password" name="password" placeholder="password" class="form-control form-control-lg">
                    @error('password')
                        {{$message}}
                    @enderror 
                    <br>
                </div>

                <div class="form-group">
                    <label for="password">Задайте пароль:</label>
                    <input type="password" name="password_confirmation" placeholder="password" class="form-control form-control-lg">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror 
                    <br>
                </div>

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <br>
                <button class="blue_button" type="submit"> отправить </button>
                {{-- Вывод сообщения об отправке письма --}}
                @if(session('message'))
                    <div class="register-message">
                        {{session('message')}}
                    </div>
                @endif
            </form>
        </div>
    </div>
    
    
    
@endsection