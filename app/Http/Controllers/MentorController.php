<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Models\Mentor;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $mentors = Mentor::all();

        return view('mentor.index',[
            'courses' => $courses,
            'mentors' => $mentors,
            'page' => 'Mentors'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentor = new Mentor();
        $numbers = DB::table('users')->select(DB::raw('id,name'))->where('role_id', '=', 2)->get();

        return view('mentor.create',[
            'mentor' => $mentor,
            'numbers' => $numbers,
            'page' => 'Add mentor'
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
        //dd($request);
        //запись в БД
        $request->validate([
            'fullname' => 'required|max:150', 
            'avatar' => 'required',
            'text' => 'required|max:1000',
        ]);

        $mentor = new Mentor();
        
        $mentor->fullname = $request->input('fullname');
        $mentor->mentor_id = $request->input('mentor_id');
        $mentor->text = $request->input('text');
        
        $path = $request->file('avatar');

        //cover
        if($path) {
            $originalName = $path->getClientOriginalName();
            $path->move(public_path().'/assets/mentors/',$originalName);
            $mentor->avatar = '/assets/mentors/'.$originalName;
        }
        else {
            $mentor->avatar = '';
        }

        $mentor->save();

        //если произошла ошибка и данные не сохранились
        if(!$mentor->save()) {
            $err=$course->getErrors();
            return redirect()->route('mentor.create')->with('errors',$err)->withInput();
        }
        //Данные сохранились
        return redirect()->route('mentor.create')->with('message',$mentor->fullname.' успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mentor = Mentor::find($id);
        $numbers = DB::table('users')->select(DB::raw('id,name'))->where('role_id', '=', 2)->get();

        return view('mentor.edit',[
            'mentor' => $mentor,
            'numbers' => $numbers,
            'page' => 'Edit mentor'
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
        $mentor = Mentor::find($id);

        $mentor->update($request->all());

        $path = $request->file('avatar');

        //cover
        if($path) {
            $originalName = $path->getClientOriginalName();
            $path->move(public_path().'/assets/mentors/',$originalName);
            $mentor->avatar = '/assets/mentors/'.$originalName;
        }

        $mentor->save();

        //если произошла ошибка и данные не сохранились
        if(!$mentor->save()) {
            $err=$course->getErrors();
            return redirect()->route('mentor.edit')->with('errors',$err)->withInput();
        }
        //Данные сохранились
        return redirect()->back()->with('message',' Изменения успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        $mentor->delete();

        return back();
    }
}
