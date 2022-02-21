<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use App\Declaration;
use App\Achievement;
use App\Http\Requests\AchievementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(Request $request, Article $article)
    {
        $achievement = $request->input('action');
        $user = User::where('id', Auth::id())->first();

        return view('achievement.edit', [
            'article' => $article,
            'achievement' => $achievement,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Article $article)
    public function update(AchievementRequest $request, Article $article)
    {
        $achievement = Achievement::where('article_id', $article->id)->first();
        $achievement->article_id = $article->id;
        $achievement->achievement = $request->input('achievement');
        $achievement->study = $request->input('study');
        $achievement->enthusiasm = $request->input('enthusiasm');
        $achievement->cause = $request->input('cause');
        $achievement->solution = $request->input('solution');
        $achievement->save();

        $article->status = $request->input('achievement');
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
