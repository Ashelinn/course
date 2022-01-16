@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <h3>Уроки Java Script</h3>
            </div>
        </div>
            
                {{-- Поиск по курсам --}}
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('course.search')}}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="введите слово" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" id="search">
                                <button class="blue_button m-left" type="submit" id="button-addon2">искать</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Категории уроков --}}
                <div class="row">
                    <div class="col-12">
                        <ul class="categories-container m-bottom-8">
                            @foreach ($categories as $category)
                                <li class="categoties-link">
                                    <a href="{{route('categories.show',$category->id)}}" class="bluelink">{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            

        
        {{-- Ссылки для менторов и администратора --}}
        @if (!Auth::guest() && Auth::user()->role_id == 2)
        <div class="row">
            <div class="col-12">
                <div class="flex-container m-bottom-5">
                        {{-- Ссылка на страницу добавления курса --}}
                        <a href="{{route('course.create')}}" class="header-menu__button">Создать новый курс</a>

                        {{-- Показать только свои курсы --}}
                        <form action="{{route('course.mentorCourse')}}" method="POST">
                        @csrf
                            <input type="hidden" name="author_id" value="{{Auth::user()->id}}">
                            <button class="blue_button m-left" type="submit" id="button-addon2">Показать мои курсы</button>
                        </form>
                </div>
            </div>
        </div>  
        @endif      

        {{-- Вывод курсов --}}
        <div class="row justify-content-center">
                @if(count($courses))
                    @foreach ($courses as $course)  
                    <div class="col-sm-12 col-md-6 col-lg-4">    
                        <div class="course-card">
                            <div class="course-card_img">
                                <img src="{{$course->cover}}" alt="{{$course->title}}">
                            </div>
                            <div class="course-card_body">
                                <h5 class="course-card_title">{{$course->title}}</h5>
                                <p class="course-price">Стоимость: {{$course->price}}&#8381;</p>
                                <p class="course-card_text">{{$course->description}}</p>
                                <p>
                                    <a href="{{route('course.show', $course->id)}}" class="bluelink_button">Перейти к уроку</a>
                                </p>
                    
                                {{-- редактирование курса (для менторов и администратора) --}}
                                @if(!Auth::guest() && Auth::user()->role_id !== 3)
                                    <div class="m-top-4">
                                        <a href="{{route('course.edit', $course->id)}}" class="bluelink">редактировать курс</a>
                                        <form action="{{route('course.destroy', $course->id)}}" method="POST">
                                            @csrf @method('DELETE')
                                                <a href="{{route('course.destroy', $course->id)}}" class="redlink" onclick="event.preventDefault();{this.closest('form').submit();}">удалить курс</a>
                                        </form>          
                                    </div>
                                @endif
                            </div> 
                        </div> 
                    </div>
                    @endforeach
    
                @else
                    <div class="container" style="margin-bottom: 15px;">По вашему запросу ничего не найдено</div>
                @endif
        </div>   

    </div>
@endsection