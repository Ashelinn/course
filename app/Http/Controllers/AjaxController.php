<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Comment;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //добавление комментариев
    public function addComment(Request $request) {
        
        $comment = Comment::create($request->all());
        
        return response()->json([
            'id'=>$comment->id,
            'user_id' => auth()->id(),
            'user_name' => $comment->user_name,
            'course_name' => $comment->course_id,
            'text' => $comment->text
        ]);
    }

    //Смена ролей
    /*
    public function changeRole(Request $request, $id) {
        $user = User::find($id);
        $user->role_id = $request->input('role_id');
        $user->save();

        return response()->json([
            'user'=> $user,
            'roles' => Role::all()
        ]);
    }
    */
}