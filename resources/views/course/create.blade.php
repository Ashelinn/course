@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        @if (!Auth::guest())
            <h3 class="form-title">Форма создания курса</h3>
            <p class="form-subtitle">Поля, отмеченные звездочкой, обязательны к заполнению</p>

            @if(session('message'))
                <div class="form-sucsess">
                    {{session('message')}}
                </div>
            @endif

            <form action="{{route('course.store')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- Название курса --}}
                    <div class="col-3">
                        <label for="title">Название курса <span class='redtext'>*</span>:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                        @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <hr class="form-line">
                    {{-- связываем с категориями --}}
                    <div class="col-3">
                        <label for="category_id">Выбрать категорию:<span class='redtext'>*</span>:</label>
                    </div>
                    <div class="col-9">
                        <select name="category_id" id="category_id">
                            <option value="0" disabled>Выберите</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="form-line">
                    {{-- Цена курса --}}
                    <div class="col-3">
                        <label for="price">Цена курса <span class='redtext'>*</span>:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" id="price" name="price" class="form-control" value="{{old('price')}}">
                        @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
        
                    <hr class="form-line">
                    {{-- Обложка курса --}}
                    <div class="col-3">
                        <label for="cover">Обложка курса <span class='redtext'>*</span>:</label>
                    </div>
                    <div class="col-9">
                        <input type="file" id="cover" name="cover" class="form-control">
                    </div>

                    <hr class="form-line">
                    {{-- Описание курса --}}
                    <div class="col-3">
                        <label for="description">Описание курса <span class='redtext'>*</span>:</label>
                    </div>
                    <div class="col-9">
                        <textarea name="description" id="description"  rows="2" class="form-control">{{old('description')}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <hr class="form-line">
                    {{-- Вступление --}}
                    <div class="col-3">
                        <label for="introduction">Вступление <span class='redtext'>*</span>:</label>
                    </div>
                    <div class="col-9">
                        <textarea name="introduction" id="introduction"  rows="3" class="form-control">{{old('introduction')}}</textarea>
                        @error('introduction')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <hr class="form-line">
                    {{-- Видео курса --}}
                    <div class="col-3">
                        <label for="video">Добавить видео <span class='redtext'>*</span>:</label>
                    </div>
                    <div class="col-9">
                        <input type="file" id="video" name="video" class="form-control">
                    </div>
        
                    <hr class="form-line">
                    {{-- Дополнительные блоки (не обязательны) --}}

                    {{-- текстовый блок --}}
                    <div class="col-3">
                        <label for="block1">добавить текст:</label>
                    </div>
                    <div class="col-9">
                        <textarea name="block1" id="block1"  rows="5" class="form-control">{{old('block1')}}</textarea>
                    </div>

                    <hr class="form-line">
                    {{-- изображение --}}
                    <div class="col-3">
                        <label for="img1">Добавить изображение:</label>
                    </div>
                    <div class="col-9">
                        <input type="file" id="img1" name="img1" class="form-control">
                    </div>

                    <hr class="form-line">
                    {{-- текстовый блок --}}
                    <div class="col-3">
                        <label for="block2">добавить текст:</label>
                    </div>
                    <div class="col-9">
                        <textarea name="block2" id="block2"  rows="5" class="form-control">{{old('block2')}}</textarea>
                    </div>

                    <hr class="form-line">
                    {{-- изображение --}}
                    <div class="col-3">
                        <label for="img2">Добавить изображение:</label>
                    </div>
                    <div class="col-9">
                        <input type="file" id="img2" name="img2" class="form-control">
                    </div>
        
                    <hr class="form-line">
                    {{-- Задание к уроку --}}
                    <div class="col-3">
                        <label for="exercise">Добавить задание к уроку:</label>
                    </div>
                    <div class="col-9">
                        <input type="file" id="exercise" name="exercise" class="form-control">
                    </div>

                    <hr class="form-line">
                    {{-- Файлы к уроку --}}
                    <div class="col-3">
                        <label for="file">Добавить файлы к уроку:</label>
                    </div>
                    <div class="col-9">
                        <input type="file" id="file" name="file" class="form-control">
                    </div>

                    {{-- Скрытое поля я именем автора --}}
                    <div class="col-12">
                        <input type="hidden" name="author_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="author" value="{{Auth::user()->name}}">
                    </div>
                </div>

                <hr class="form-line">
                <div class="row">
                        <button type="submit" name="add"  class="blue_button">Добавить курс</button>
                </div>
            </form>

        @else
            <img src="{{asset('assets/img/not.jpg')}}" alt="Strausstrup">
            <p class="m-top-4">Вы вышли из системы. Страница больше не доступна</p>
        @endif

    </div>
    
@endsection