@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        @if (!Auth::guest())
        <h3>Добавить преподавателя</h3>
        <p class="form-subtitle">Все поля обязательны к заполнению</p>
        @if(session('message'))
            <div class="form-sucsess">
                {{session('message')}}
            </div>
        @endif

        <form action="{{route('mentor.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf
            <div class="row">
                {{-- fullname --}}
                <div class="col-3">
                    <label for="fullname">Имя и фамилия:</label>
                </div>
                <div class="col-9">
                    <input type="text" id="fullname" name="fullname" class="form-control form-control-lg" value="{{old('fullname')}}">
                    @error('fullname')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <hr class="form-line">
                {{-- связываем с users --}}
                <div class="col-3">
                    <label for="mentor_id">Выбрать из таблицы:</label>
                </div>
                <div class="col-9">
                    <select name="mentor_id" id="mentor_id">
                        <option value="0" disabled>Выберите</option>
                        @foreach ($numbers as $number)
                        <option value="{{$number->id}}">{{$number->name}}</option>
                        @endforeach
                    </select>
                </div>

                <hr class="form-line">
                {{-- avatar --}}
                <div class="col-3">
                    <label for="avatar">Аватарка:</label>
                </div>
                <div class="col-9">
                    <input type="file" id="avatar" name="avatar" class="form-control form-control-lg">
                </div>

                <hr class="form-line">
                {{-- текст --}}
                <div class="col-3">
                    <label for="text">Текст:</label>
                </div>
                <div class="col-9">
                    <textarea name="text" id="text"  rows="4" class="form-control form-control-lg">{{old('text')}}</textarea>
                    @error('text')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                </div>
            <div class="row">
                <button type="submit" name="add"  class="blue_button">Добавить</button>
            </div>
        </form>

        @else
            <img src="{{asset('assets/img/not.jpg')}}" alt="not found">
            <p>Вы вышли из системы. Страница больше не доступна</p>
        @endif
    </div>
    
@endsection