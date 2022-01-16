@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        <h3>Все соощения пользователя <span class="bluetext">{{$user->name}}</span></h3>
        @foreach ($comments as $comment)
            <h4>Комментарий:</h4>
            <p>{{$comment->text}}</p>
            <p class="course-info">Создан: {{date('d-m-Y', strtotime($comment->created_at));}}</p>  
            <div class="comment-b_wrap">
                <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{route('comment.destroy', $comment->id)}}" class="redlink_button" onclick="event.preventDefault();{this.closest('form').submit();}">удалить</a>
                </form> 
            </div>             
            <hr>          
        @endforeach    
    </div>    

@endsection