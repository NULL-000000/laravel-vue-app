<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

   public function store(Request $request)
   {
       $comment = new Comment();
       $comment->comment = $request->comment;
       $comment->article_id = $request->article_id;
       $comment->user_id = Auth::user()->id;
       $comment->save();

       return redirect('/');
   }

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
