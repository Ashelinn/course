@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">
        {{-- Не зарегестрированный гость --}}
        @if (Auth::guest())
            <div class="row">
                <div class="col-3">
                    {{-- Обложка и описание курса --}}
                    <div class="course-img">
                        <img src="{{$course->cover}}" alt="{{$course->title}}">
                    </div>
                    <p class="course-description">{{$course->description}}</p>
                </div>
                {{-- содержимое курса. Только заголовок, автор и дата публикации --}}
                <div class="col-9">
                    <h2 class="course-title">{{$course->title}}</h2>
                    <p class="course-info">Автор курса: <b>{{$course->author}}</b>. Дата публикации: <b>{{date('d-m-Y', strtotime($course->created_at));}}</b></p>
                <p>Для просмотра данной страницы, вы должны быть зарегестрированнны. <a href="{{route('login.page')}}">Войдите</a> или <a href="{{route('register.page')}}">зарегестрируйтесь</a></p>

                {{-- Комментарии --}}
                <div id="comments-block">
                    <h4>Комментарии:</h4>
                    <div id="comment_list">
                        @foreach ($comments->reverse() as $comment)
                                <div class="comment-wrap">
                                    <h4>{{$comment->user_name}}</h4>
                                    <p>{{$comment->text}}</p>
                                </div>
                        @endforeach
                    </div>   
                </div>
            </div>
                
             
        {{-- ************************************************************************* --}}        
        {{-- Зарегестрированный пользователь --}}    
        @else
            <div class="row">
                {{--редактирование курса (для менторов и администратора) --}}
                <div class="col-3">
                    <div class="course-img">
                        <img src="{{$course->cover}}" alt="{{$course->title}}">
                    </div>
                    <p class="course-description">{{$course->description}}</p>
                    {{-- Ссылки на редактирование курса --}}
                    <p>
                        @if(Auth::user()->role_id !== 3)
                            <a href="{{route('course.edit', $course->id)}}" class="header-menu__button">редактировать курс</a>         
                        @endif
                    </p>
                </div>

                {{-- Обложка и описание курса --}}
                <div class="col-9">
                    <h2 class="course-title">{{$course->title}}</h2>
                    <p class="course-info">Автор курса: <b>{{$course->author}}</b>. Дата публикации: <b>{{date('d-m-Y', strtotime($course->created_at));}}</b></p>
                    
                        {{-- проверка оплаты --}}
                        <?php $confirm = 0; ?>
                        @foreach ($payments as $pay)
                            @if ($pay->user_id == Auth::user()->id)
                            <?php $confirm = 1; ?>
                            @endif
                        @endforeach
                    
                    @if (Auth::user()->role_id == 3 && !$confirm)
                        <p>Для просмотра данной страницы, вы должны приобрести курс</p>   
                        <form action="{{route('pay.store')}}" method='POST' class=" needs-validation">
                            @csrf()
                                <div class="col-12">
                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                </div>
                            <button type="submit" class="blue_button">оплатить курс</button>
                        </form>
                    @else 
                        {{-- содержимое курса --}}
                        <p>{!!$course->introduction!!}</p>
                        {{-- video --}}
                        <video controls="controls" class="course-video">
                            <source src="{{$course->video}}">
                        </video>
                        {{-- Вывод не обязательных полей, если они есть --}}
                        {{-- 1 блок --}}
                        @if ($course->block1)
                            <div>
                                {!!$course->block1!!}
                            </div>
                        @endif

                        @if ($course->img1)
                            <div class="course-block_img">
                                <img src="{{$course->img1}}" alt="{{$course->title}}">
                            </div>
                        @endif

                        {{-- 2 блок --}}
                        @if ($course->block2)
                            <div>
                                {!!$course->block1!!}
                            </div>
                        @endif

                        @if ($course->img2)
                            <div class="course-block_img">
                                <img src="{{$course->img2}}" alt="{{$course->title}}">
                            </div>
                        @endif

                        {{-- Задание к уроку --}}
                        @if ($course->exercise)
                            <div>
                                <h3>Задание к уроку:</h3>
                                <a href="{{$course->exercise}}" download>Скачать задание</a>
                            </div>
                        @endif

                        {{-- Исходники к уроку --}}
                        @if ($course->file)
                            <div>
                                <h3>Файлы к уроку:</h3>
                                <a href="{{$course->file}}" download class="bluelink">Скачать исходники</a>
                            </div>
                        @endif

                        {{-- онлайн редактор кода --}}
                        <div>
                            <h3>Онлайн редактор:</h3>
                            <iframe src="https://itproger.com/ide/javascript.php" frameborder="0" style="width: 100%; height:460px"></iframe>
                        </div>
                    @endif
             


        {{-- **************************************************************************** --}}              
        {{-- Комментарии --}}
        <div id="comments-block">
            {{-- комментарии оставляют только залогиненые пользователи --}}
            @if(Auth::guest())
                <p>
                    Комментировать могут только зарегестрированнные пользователи. <a href="{{route('login.page')}}">Войдите</a> или <a href="{{route('register.page')}}">зарегестрируйтесь</a>
                </p>
            @else
                <div class="row">
                    <div class="col-12">
                        @if (Auth::user()->ban == '0')
                            <p>Вам закрыт доступ к комментированию</p>
                        @else
                            <form action="{{route('ajax.add-comment')}}" method='POST' class=" needs-validation" id="addcomment-form" novalidate>
                            @csrf()
                                <div class="form-group">
                                    <h4>Комментарии:</h4>
                                    {{-- связываем с курсом и пользователем --}}
                                    <div class="col-12">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                    </div>
                                    <textarea name="text" id="text" class="form-control @error('text') redline @enderror" rows="2" required> Написать комментарий </textarea>
                                </div>
                                <button type="submit" class="blue_button">Отправить</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Вывод имеющихся отзывов -->
            <div id="comment_list">
                @foreach ($comments->reverse() as $comment)
                        <div class="comment-wrap">
                            <h4>{{$comment->user_name}}</h4>
                            <p>{{$comment->text}}</p>
                        </div>
                @endforeach
            </div>    
        @endif

        </div> 
        </div>
        </div>
        
    </div>
    <script type="text/javascript" src="{{asset('assets/js/ajax_comments.js')}}"></script>

@endsection