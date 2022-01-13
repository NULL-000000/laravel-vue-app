<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

   public function store(CommentRequest $request)
   {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $request->article_id;
        $comment->comment = $request->comment;
        $comment->save();

        return back();
   }

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();

        return back();
    }
}
