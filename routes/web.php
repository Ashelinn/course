<?php
use Illuminate\Support\Facades\Route;

//для регистрации и сброса пароля
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

//контроллеры страниц
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PaymentController;

//ajax-контроллер
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home.index');
});

/* -------------------------------------------------------------------------------
аутентификация
------------------------------------------------------------------------------- */
Route::get('/login',[AuthController::class, 'loginPage'])->name('login.page');
Route::post('/login',[AuthController::class, 'login'])->name('login');

/* -------------------------------------------------------------------------------
регистрация
------------------------------------------------------------------------------- */
Route::get('/register',[AuthController::class, 'registerPage'])->name('register.page');
Route::post('/register',[AuthController::class, 'register'])->name('register');

/* -------------------------------------------------------------------------------
выход из учетной записи
------------------------------------------------------------------------------- */
Route::post('/logout',[authController::class,'logout'])->name('logout');

/* -------------------------------------------------------------------------------
страница сброса пароля
------------------------------------------------------------------------------- */
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

/* -------------------------------------------------------------------------------
обрабатывает запрос на отправку формы из шаблона forgot-password 
проверяет адрес эл.почты и отправляет запрос на сброс пароля
------------------------------------------------------------------------------- */
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

/* -------------------------------------------------------------------------------
фактический сброс пароля
------------------------------------------------------------------------------- */
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

/* --------------------------------------------------------------------------------------
отвечает за проверку входящего запроса и обновление пароля пользователя в базе данных 
----------------------------------------------------------------------------------------- */
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

/* -------------------------------------------------------------------------------
поиск
------------------------------------------------------------------------------- */
Route::post('course/search',[CourseController::class,'search'])->name('course.search');

/* -------------------------------------------------------------------------------
Game-контроллер
------------------------------------------------------------------------------- */
Route::get('/games',[GameController::class,'index'])->name('games.index');

/* -------------------------------------------------------------------------------
Показ публикаций ментора
------------------------------------------------------------------------------- */
Route::post('course/mentor_course',[CourseController::class,'mentorCourse'])->name('course.mentorCourse');

/* -------------------------------------------------------------------------------
Показ курсов по выбору категорий
------------------------------------------------------------------------------- */
Route::get('course/choise_course',[CourseController::class,'choiseCourse'])->name('course.choiseCourse');

/*-------------------------------------------------------------------------------
Ajax запрос для комментариев
---------------------------------------------------------------------------------*/
Route::post('course/ajax-store',[AjaxController::class,'addComment'])->name('ajax.add-comment');

/*-------------------------------------------------------------------------------
Ajax запрос для ролей
---------------------------------------------------------------------------------*/
Route::get('admin/ajaxrole-store/{id}',[AjaxController::class,'changeRole'])->name('ajax.change_role');
Route::match(['GET','POST'],'admin/role',[AdminController::class,'updateRole'])->name('admin.updaterole');

/*---------------------------------------------------------------------------------
Контроль оплаты
-----------------------------------------------------------------------------------*/
Route::resource('pay',PaymentController::class);

/* -------------------------------------------------------------------------------
Home page 
------------------------------------------------------------------------------- */
Route::resource('home',HomeController::class);

/* -------------------------------------------------------------------------------
Категории
------------------------------------------------------------------------------- */
Route::resource('categories',CategoryController::class);

/* -------------------------------------------------------------------------------
КУРСЫ 
------------------------------------------------------------------------------- */
Route::resource('course',CourseController::class);

/* -------------------------------------------------------------------------------
МЕНТОРЫ
------------------------------------------------------------------------------- */
Route::resource('mentor',MentorController::class);

/* -------------------------------------------------------------------------------
Панель администратора
------------------------------------------------------------------------------- */
Route::resource('admin',AdminController::class);

/* -------------------------------------------------------------------------------
КЩММЕНТАРИИ для админа
------------------------------------------------------------------------------- */
Route::match(['GET','POST'],'admin/comment_user/{id}',[CommentController::class,'userComments'])->name('admin.userComments');
//Route::get('admin/comment_user/{id}',[CommentController::class,'userComments'])->name('admin.userComments');
Route::resource('comment',CommentController::class);

/*----------------------------------------------------------------------------------
Роуты для игр
----------------------------------------------------------------------------------*/
Route::match(['GET','POST'],'games/logica',[GameController::class,'logicaGame'])->name('games.logica');
Route::match(['GET','POST'],'games/arcanoid',[GameController::class,'arcanoidGame'])->name('games.arcanoid');
Route::match(['GET','POST'],'games/clickgame',[GameController::class,'clickGame'])->name('games.clickgame');

/*----------------------------------------------------------------------------------
Роут для страницы "О нас"
----------------------------------------------------------------------------------*/
Route::match(['GET','POST'],'home/about',[HomeController::class,'aboutus'])->name('home.about');