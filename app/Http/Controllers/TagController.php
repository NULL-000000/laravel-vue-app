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
        $user = User::where('id', Auth::id())->first();

        $data = [
            'tag' => $tag,
            'user' => $user,
        ];

        return view('tags.show', $data);
    }
}
