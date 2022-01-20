<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use App\Achievement;
use App\Declaration;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at')->load(['user', 'likes', 'tags', 'achievement', 'declaration']);
        $user = User::where('id', Auth::id())->first();
        $sort = "新しい順";
        $sort_type = "create_at_desc";
        $allTagNames = Tag::all();

        $data = [
            'articles' => $articles,
            'user' => $user,
            'sort' => $sort,
            'sort_type' => $sort_type,
            'allTagNames' => $allTagNames,
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
        $article->save();

        $declaration = new Declaration();
        $declaration->article_id = $article->id;
        $declaration->declaration = "declaration";
        $declaration->save();

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

    //記事一覧ページでの並び替え機能
    public function sort(string $sort_type)
    {
        $user = User::where('id', Auth::id())->first();
        $Article = new Article;
        $all_articles_by_sort = $Article->sortByselectedSortType($sort_type)->with(['user', 'likes', 'comments']);
        $articles = $all_articles_by_sort->paginate(3);
        $articles_count = $all_articles_by_sort->count();
        $allTagNames = Tag::all();

        $sort = '新しい順';

        switch($sort_type) {
            case 'create_at_desc':
                $sort = '新しい順';
                break;
            case 'create_at_asc':
                $sort = '古い順';
                break;
            // case 'like_count_desc':
            //     $sort = 'いいね数順';
            //     break;
            // case 'like_count_asc':
            //     $sort = 'いいね数順';
            //     break;
            // case 'comment_count_desc':
            //     $sort = 'コメント数順';
            //     break;
            // case 'comment_count_asc':
            //     $sort = 'コメント数順';
            //     break;
        }

        $data = [
            'articles' => $articles,
            'user' => $user,
            'sort_type' => $sort_type,
            'sort' => $sort,
            'articles_count' => $articles_count,
            'allTagNames' => $allTagNames,
        ];
        return view('articles.index', $data);
    }

}
