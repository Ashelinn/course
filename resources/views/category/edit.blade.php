@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        
            <form action="{{route('categories.update', $category->id)}}" method="POST">
                {{-- метод PUT для обновления данных --}}
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <label for="name">Категория курса:</label>                  
                        <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{$category->name}}">
                        @error('category')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="edit" class="blue_button m-top-4">Сохранить изменения</button>
                    </div>
                </div>
            </form>
        
    </div>
@endsection