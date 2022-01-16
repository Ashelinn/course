@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-12">
                <h3>Работа с категориями</h3>
            </div>
        </div>
        {{-- Добавление категорий --}}
        <div class="row">
            <div class="col-12">
                <div class="m-bottom-8">
                    <form action="{{route('categories.store')}}" method='POST' class="needs-validation"  novalidate>
                        @csrf()
                        <div class="form-group">
                            <p><label for="name">Добавить категорию:</label></p>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="blue_button">Добавить категорию</button>
                    </form>
                    @if(session('message'))
                        <div class="alert alert-sucsess" style="color: green;">
                            {{session('message')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Вывод имеющихся курсов --}}
        <div class="row">
            <div class="col-12">
                <div class="m-bottom-8">
                    <h4>Категории курсов:</h4>
                    <table class="table">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" class="bluelink_button">редактировать</a>
                                </td>
                                <td>
                                    <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="{{route('categories.destroy', $category->id)}}" class="redlink_button" onclick="event.preventDefault();{this.closest('form').submit();}">удалить</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <h3>Работа с пользователями</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>имя</th>
                        <th>e-mail</th>
                        <th>роль</th>
                        <th>изменить роль</th>
                        <th>бан</th>
                        <th>забанить</th>
                        <th>удалить</th>
                        <th>действия</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if($user->name == 'Admin')
                                <td>суперадминистратор</td>
                                <td></td>
                            @else
                                <td>{{$user->roles->role_name}}</td>
                                <td>
                                    <form action="{{route('admin.updaterole')}}">
                                    <label for="roles_id">Изменить роль:</label>
                                    <select name="role_id" id="role_id">
                                        <option selected>{{ $user->roles->role_name }}</option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                                @endforeach
                                    </select>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <button type="submit" name="confirm" class="blue_button m-top-1">изменить</button>
                                </form>
                            @endif
                            </td>
                            <td>{{$user->ban}}</td>
                            <td>
                                @if($user->name == 'Admin')
                                @else
                                    <div class="m-bottom-5">
                                        <a href="{{route('admin.edit', $user->id)}}" class="redlink_button">забанить</a>
                                    </div>
                                    <div>
                                        <a href="{{route('admin.edit', $user->id)}}" class="bluelink_button">отменить</a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($user->name == 'Admin')
                                
                                @else
                                    <form action="{{route('admin.destroy', $user->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="{{route('admin.destroy', $user->id)}}" class="redlink_button" onclick="event.preventDefault();{this.closest('form').submit();}">удалить</a>
                                    </form>
                                @endif
                            </td>
                            <td>
                                {{-- Ссылки для менторов --}}
                                @if ($user->role_id == 2)
                                    <div class="m-bottom-1 .m-top-m2">
                                        <form action="{{route('course.mentorCourse')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="author_id" value="{{$user->id}}">
                                            <button class="blue_button" type="submit" id="button-addon2">Все курсы</button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{route('admin.userComments',$user->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <button class="blue_button" type="submit" id="button-addon2">Комментарии</button>
                                        </form>
                                    </div>
                                {{-- Ссылки для пользователей --}}
                                @else
                                <div class="m-top-m2">
                                    <form action="{{route('admin.userComments',$user->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <button class="blue_button" type="submit" id="button-addon2">Комментарии</button>
                                    </form>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <script type="text/javascript" src="{{asset('assets/js/ajax_roles.js')}}"></script>
        </div>  
    </div>    

@endsection