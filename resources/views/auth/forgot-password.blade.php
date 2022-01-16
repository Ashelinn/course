@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
    <?php $page="Home" ?>
    <div class="container">
        <div class="register-wrap">
            <h3>Страница сброса пароля</h3>
            <p>Укажите e-mail, под которым вы зарегестрированы на сайте и на него будет отправлена информация о восстановлении пароля</p>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="your e-mail" class="form-control form-control-lg">
                    @error('email')
                        {{$message}}
                    @enderror 
                    <br>
                </div>
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