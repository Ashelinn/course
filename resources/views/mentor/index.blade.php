@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Наши преподаватели о себе</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if (!Auth::guest() && Auth::user()->id ==1)
                    {{-- Ссылка на страницу добавления ментора --}}
                    <p class="m-top-4 m-bottom-8">
                        <a href="{{route('mentor.create')}}" class="bluelink_button">Добавить ментора</a>
                    </p>
                @endif
            </div>
        </div>
        

        <div class="row">
                @foreach ($mentors as $mentor)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="course-card">
                            <div class="course-card_img">
                                <img src="{{$mentor->avatar}}" alt="{{$mentor->fullname}}">
                            </div>
                            <div class="course-card_body">
                                <h5 class="course-card_title">{{$mentor->fullname}}</h5>
                                <p class="course-card_text">{!!$mentor->text!!}</p>

                                <p style="margin-bottom: 70px;">
                                    <form action="{{route('course.mentorCourse')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="author_id" value="{{$mentor->mentor_id}}">
                                        <button class="blue_button" type="submit" id="button-addon2">Все курсы ментора</button>
                                    </form>
                                </p>
                                
                                @if (!Auth::guest() && Auth::user()->id ==1)
                                <a href="{{route('mentor.edit', $mentor->id)}}" class="bluelink">редактировать</a>
                                    <form action="{{route('mentor.destroy', $mentor->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="{{route('mentor.destroy', $mentor->id)}}" class="redlink" onclick="event.preventDefault();{this.closest('form').submit();}">удалить</a>
                                    </form>          
                                @endif
                            
                            </div>
                        </div> 
                    </div>
                @endforeach
    </div>
        </div>

@endsection