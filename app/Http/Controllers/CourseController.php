<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Payment;

use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        
        return view('course.index',[
            'courses' => $courses,
            'categories' => $categories,
            'page' => 'Courses'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        $categories = Category::all();

        return view('course.create',[
            'course' => $course,
            'categories' => $categories,
            'page' => 'Add course'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //запись курса в БД
        $request->validate([
            'title' => 'required|max:150', 
            'cover' => 'required',
            'description' => 'required',
            'introduction' => 'required',
            'video'=> 'required',
        ]);

        //dd($request);

        $course = new Course();
        //текстовые поля
        $course->title = $request->input('title');
        $course->category_id = $request->input('category_id');
        $course->price = $request->input('price');
        $course->description = $request->input('description');
        $course->introduction = $request->input('introduction');
        $course->block1 = $request->input('block1');
        $course->block2 = $request->input('block2');
        $course->author_id = $request->input('author_id');
        $course->author = $request->input('author');
        
        //файлы
        $cover_path = $request->file('cover');
        $video_path = $request->file('video');
        $img1_path = $request->file('img1');
        $img2_path = $request->file('img2');
        $exercise_path = $request->file('exercise');
        $file_path = $request->file('file');

        //cover
        if($cover_path) {
            $originalName = $cover_path->getClientOriginalName();
            $cover_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->cover = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        else {
            $course->cover = '';
        }

        //video
        if($video_path) {
            $originalName = $video_path->getClientOriginalName();
            $video_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->video = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        else {
            $course->video = '';
        }

        //img1
        if($img1_path) {
            $originalName = $img1_path->getClientOriginalName();
            $img1_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->img1 = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        else {
            $course->img1 = '';
        }

        //img2
        if($img2_path) {
            $originalName = $img2_path->getClientOriginalName();
            $img2_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->img2 = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        else {
            $course->img2 = '';
        }

        //exercise
        if($exercise_path) {
            $originalName = $exercise_path->getClientOriginalName();
            $exercise_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->exercise = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        else {
            $course->exercise = '';
        }

        //file
        if($file_path) {
            $originalName = $file_path->getClientOriginalName();
            $file_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->file = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        else {
            $course->file = '';
        }

        $course->save();

        //если произошла ошибка и данные не сохранились
        if(!$course->save()) {
            $err=$course->getErrors();
            return redirect()->route('course.create')->with('errors',$err)->withInput();
        }
        //Данные сохранились
        return redirect()->route('course.create')->with('message','Курс "'.$course->title.'" успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $comments = DB::table('comments')->select(DB::raw('id,user_name,text,created_at'))->where('course_id', '=', $id)->get();
        $payments = DB::table('payments')->select(DB::raw('user_id,course_id'))->where('course_id', '=', $id)->get();

        return view('course.show',[
            'page' => 'Course',
            'course' => $course,
            'comments' => $comments,
            'payments' => $payments
        ]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::all();

        return view('course.edit',[
            'page' => 'Edit course',
            'course' => $course,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $course->update($request->all());

        //файлы
        $cover_path = $request->file('cover');
        $video_path = $request->file('video');
        $img1_path = $request->file('img1');
        $img2_path = $request->file('img2');
        $exercise_path = $request->file('exercise');
        $file_path = $request->file('file');

        //cover
        if($cover_path) {
            $originalName = $cover_path->getClientOriginalName();
            $cover_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->cover = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        
        //video
        if($video_path) {
            $originalName = $video_path->getClientOriginalName();
            $video_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->video = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
       
        //img1
        if($img1_path) {
            $originalName = $img1_path->getClientOriginalName();
            $img1_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->img1 = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        
        //img2
        if($img2_path) {
            $originalName = $img2_path->getClientOriginalName();
            $img2_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->img2 = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        
        //exercise
        if($exercise_path) {
            $originalName = $exercise_path->getClientOriginalName();
            $exercise_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->exercise = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        
        //file
        if($file_path) {
            $originalName = $file_path->getClientOriginalName();
            $file_path->move(public_path().'/assets/courses/'.$request->input('author').'/'.$request->input('title'),$originalName);
            $course->file = '/assets/courses/'.$request->input('author').'/'.$request->input('title').'/'.$originalName;
        }
        
        $course->save();

        //если произошла ошибка и данные не сохранились
        if(!$course->save()) {
            $err=$course->getErrors();
            return redirect()->route('course.edit')->with('errors',$err)->withInput();
        }
        //Данные сохранились
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return back();
    }

    //функция поиска 
    public function search(Request $request)
    {
        $search = $request->input('search');
        $search = '%'.$search.'%';

        $courses = Course::where('title','LIKE',$search)->get();
        $course_ids = array();

        return view('course.index',[
            'page'=>'Course',
            'courses'=>$courses,
            'categories' => Category::all()
        ]);
    }

    //функция поиска 
    public function mentorCourse(Request $request)
    {

        $categories = Category::all();
        $mentor = $request->input('author_id');
        
        $courses = Course::where('author_id','LIKE',$mentor)->get();
        $course_ids = array();

        return view('course.index',[
            'page'=>'Course',
            'courses'=>$courses,
            'categories'=>$categories
        ]);
    }

    //функция поиска 
    public function choiseCourse(Request $request)
    {
        $choise = $request->input('category_id');
        
        $courses = Course::where('category_id','LIKE',$choise)->get();
        $course_ids = array();

        return view('course.index',[
            'page'=>'Course',
            'courses'=>$courses,
            'categories' => Category::all()
        ]);
    }
}
