<?php

namespace App\Http\Controllers;

use App\PictureBook;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * サービス概要紹介画面表示
     */
    public function about()
    {
        $user = User::where('id', Auth::id())->first();

        $data = [
            'user' => $user,
        ];

        return view('articles.about', $data);
    }


    /**
     * プライバシーポリシー画面表示
     */
    public function privacy()
    {
        $user = User::where('id', Auth::id())->first();

        $data = [
            'user' => $user,
        ];

        return view('articles.privacy', $data);
    }

    /**
     * 利用規約画面表示
     */
    public function terms()
    {
        $user = User::where('id', Auth::id())->first();

        $data = [
            'user' => $user,
        ];

        return view('articles.terms', $data);
    }
}
