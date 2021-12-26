<?php

namespace App\Http\Controllers;

use App\PictureBook;

class HomeController extends Controller
{
    /**
     * サービス概要紹介画面表示
     */
    public function about()
    {
        return view('articles.about');
    }


    /**
     * プライバシーポリシー画面表示
     */
    public function privacy()
    {
        return view('articles.privacy');
    }

    /**
     * 利用規約画面表示
     */
    public function terms()
    {
        return view('articles.terms');
    }
}
