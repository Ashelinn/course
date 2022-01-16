<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('auth.register',['page'=>'Register']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:users',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:6',
        ]);

        //запись данных в БД
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id ='3';
        $user->save();

        
        //переход на главную страницу
       // return redirect()->route('sounds.index');
       if(! $user->save()) {
        $err=$user->getErrors();
        return back()->withErrors([
            'name' => 'Учетная запись не создана', 
           ]);
        }
        return redirect()->back()->with('message','Новый пользователь - '.$user->name.' успешно зарегестрирован на сайте');
    }

    public function loginPage()
    {
        return view('auth.login',['page'=>'Login']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index');
            //return view('home.index', ['page'=>'Home']);
        }
        return back()->withErrors([
         'name' => 'Логин или пароль не верны', 
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return back();
    }
}