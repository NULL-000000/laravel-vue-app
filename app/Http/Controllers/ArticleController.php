<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use App\Achievement;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index(Request $request)
    {
        $status = $request->input('status') ?? 'all';
        $user = User::where('id', Auth::id())->first();

        //タグランキング
        $tags_ranking = app()->make(Tag::class)->tagsRanking();
        //達成ランキング
        $users_ranking = app()->make(User::class)->usersRanking();

        //カテゴリ検索
        $articles = app()->make(Article::class)->category($status)->paginate(8);

        $data = [
            'articles' => $articles,
            'user' => $user,
            'status' => $status,
            'tags_ranking' => $tags_ranking,
            'users_ranking' => $users_ranking,
        ];

        return view('articles.index', $data);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $user = User::where('id', Auth::id())->first();

        return view('articles.create', [
            'allTagNames' => $allTagNames,
            'user' => $user,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->status = "declaration";
        $article->save();

        $achievement = new Achievement();
        $achievement->article_id = $article->id;
        $achievement->achievement = "unspecified";
        $achievement->save();

        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $user = User::where('id', Auth::id())->first();

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'user' => $user,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        $achievement = Achievement::where('id', $article->id)->first();
        $achievement->study = $request->input('study') ?? 'unspecified';
        $achievement->enthusiasm = $request->input('enthusiasm') ?? 'unspecified';
        $achievement->cause = $request->input('cause') ?? 'unspecified';
        $achievement->solution = $request->input('solution') ?? 'unspecified';
        $achievement->save();

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $user = User::where('id', Auth::id())->first();

        $data = [
            'article' => $article,
            'user' => $user,
        ];

        // return view('articles.show', ['article' => $article]);
        return view('articles.show', $data);
    }

    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function search(Request $request)
    {
        //キーワード（配列）
        $keywords = $request->input('keyword');
        //キーワード（文字列）
        $keyword = collect($keywords)->implode(' ');
        //カテゴリ
        $status = $request->input('status') ?? 'all';
        //ソート
        $sort = $request->input('sort') ?? 'create_at_desc';

        //ソート・検索
        $articles = app()->make(Article::class)->searchForArticlesBy($keywords, $status, $sort)->with(['user', 'likes', 'comments'])->paginate(10);

        $user = User::where('id', Auth::id())->first();

        $data = [
            'articles' => $articles,
            'keyword' => $keyword,
            'status' => $status,
            'sort' => $sort,
            'user' => $user,
        ];

        return view('articles.search', $data);
    }
}
