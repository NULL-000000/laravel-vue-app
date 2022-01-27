<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getHashtagAttribute(): string
    {
        return '#' . $this->name;
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public function tagRanking()
    {
        //サービスコンテナ
        // $query = app()->make(Tag::class)->orderBy('created_at', 'desc');
        // $query = app()->make(Tag::class)->orderBy('created_at', 'desc');

        $query = Tag::withCount('article')->orderBy('article_count', 'desc')->get();


        // $users = DB::table('users')
        //    ->where('name', '=', 'John')
        //    ->where(function ($query) {
        //        $query->where('votes', '>', 100)
        //              ->orWhere('title', '=', 'Admin');
        //    })
        //    ->get();

        //カテゴリ検索
        // if ($status !== null && $status !== 'all') {
            // $query = $query->where('status', $status);
        // }

        return $query;
    }
}
