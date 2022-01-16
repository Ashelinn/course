@extends('layouts.app')

@section('title', 'Login')
@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="login-wrap">
            <form action="{{route('login')}}" method="post">
                @csrf
        
                <div class="form-group">
                    <input type="name" name="name" placeholder="your name" class="form-control form-control-lg">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="your password" class="form-control form-control-lg">
                    <br>
                </div>
                
                <div class="message_error">
                    @error('name')
                        {{$message}}
                    @enderror 
                </div>

                <button class="blue_button" type="submit"> войти </button>
            </form>

            <div class="login-forgot">
                <a href="{{route('password.request')}}" class="header-menu__blueklink">Забыли пароль?</a>
            </div>
        </div>
    </div>    
@endsection