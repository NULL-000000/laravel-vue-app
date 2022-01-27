<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first();
        $tag->articles = $tag->articles->sortByDesc('created_at');
        $user = User::where('id', Auth::id())->first();

        //タグランキング
        $tags_ranking = app()->make(Tag::class)->tagsRanking();
        //達成ランキング
        $users_ranking = app()->make(User::class)->usersRanking();

        $data = [
            'tag' => $tag,
            'user' => $user,
            'tags_ranking' => $tags_ranking,
            'users_ranking' => $users_ranking,
        ];

        return view('tags.show', $data);
    }
}
