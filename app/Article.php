<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
        'status',
        'title',
        'period',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany('App\Comment');
    }

    public function achievement(): HasOne
    {
        return $this->hasOne('App\Achievement');
    }

    public function declaration(): HasOne
    {
        return $this->hasOne('App\Declaration');
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function category($status)
    {
        //サービスコンテナ
        $query = app()->make(Article::class)->orderBy('created_at', 'desc');

        //カテゴリ検索
        if ($status !== null && $status !== 'all') {
            $query = $query->where('status', $status);
        }

        return $query;
    }

    public function searchForArticlesBy($keywords, $status, $sort)
    {
        //サービスコンテナ
        $query = app()->make(Article::class);

        //キーワード検索
        if(!empty($keywords)) {
            foreach ($keywords as $keyword) {
                $query = $query->where('title','like','%'.$keyword.'%');
            }
        }

        //カテゴリ検索
        if ($status !== null && $status !== 'all') {
            $query = $query->where('status', $status);
        }

        //並び替え機能
        if ($sort === 'create_at_desc') {
            $query = $query->orderBy('created_at', 'desc');
        }
        if ($sort === 'create_at_asc') {
            $query = $query->orderBy('created_at', 'asc');
        }
        if ($sort === 'like_count_desc') {
            $query = $query->withCount('likes')->orderBy('likes_count', 'desc');
        }
        if ($sort === 'comment_count_desc') {
            $query = $query->withCount('comments')->orderBy('comments_count', 'desc');
        }

        return $query;
    }

}
