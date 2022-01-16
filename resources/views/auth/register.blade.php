@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="register-wrap">
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="your name" class="form-control form-control-lg" id="userName">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="your e-mail" class="form-control form-control-lg" id="userMail">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="your password" class="form-control form-control-lg" id="userPass">
                </div>
                
                {{-- сообщения --}}
                <div class="message_error">
                    @error('name')
                        {{$message}}
                    @enderror 
                </div>

                @if(session('message'))
                    <div class="message_sucsess">
                        {{session('message')}}
                    </div>
                @endif

                <button class="blue_button" type="submit" id="register"> регистрация </button>

            </form>
        </div>
    </div>
    <script>

//Проверка полей 
let reg_name = /^[a-zа-яё]{2,}$/i;     
let reg_mail = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
let reg_pass = /(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g; 

function colorField(str,reg){
    let v = str.value;
    if (reg.test(v)){
        str.style.border = '3px solid OliveDrab';
        return true;
      }
      else {
        str.style.border = '3px solid tomato';
        return false;
      }
};

function checkField(){ 
    let nam = document.querySelector('#userName');   
    let mail = document.querySelector('#userMail');
    let mess = document.querySelector('#userPass');
        
    colorField(nam,reg_name);
    colorField(mail,reg_mail);
    colorField(mess,reg_passss);
  }

let button = document.querySelector('#register');
button.addEventListener('click',checkField);

    </script>
    
    
@endsection