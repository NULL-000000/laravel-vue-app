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
        $tags_ranking = Tag::withCount('articles')->orderBy('articles_count', 'desc')->limit(5)->get();

        $data = [
            'tag' => $tag,
            'user' => $user,
            'tags_ranking' => $tags_ranking,
        ];

        return view('tags.show', $data);
    }
}
