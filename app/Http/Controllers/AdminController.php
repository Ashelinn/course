<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Models\Role;
use App\Models\Comment;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $roles = Role::all();

        return view('admin.index',[
            'categories' => $categories,
            'users' => $users,
            'roles' => $roles,
            'page' => 'Admin'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        if ($user->ban == "0") {
            $user->ban = "1";
        }
        else {
            $user->ban = "0";
        }
        
        $user->save();

        return redirect()->route('admin.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back();
    }

    public function updateRole(Request $request) {
        $userid = $request->input('user_id');
        $roleid = $request->input('role_id');

        $user = User::find($userid);
        $user->role_id = $roleid; 
        $user->save();

        if(! $user->save()) {
            $err=$user->getErrors();
            return redirect()->route('admin.index')->with('errors',$err)->withInput();
        }
        return redirect()->route('admin.index')->with('message',' ');
    }
}
