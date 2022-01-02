<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
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

    //記事一覧ページで並び替え処理
    public function sortByselectedSortType($sort_type)
    {
        if ($sort_type === 'desc') {
            return $this->orderBy('created_at', 'desc');
        } elseif ($sort_type === 'asc') {
            return $this->orderBy('created_at', 'asc');
        } elseif ($sort_type === 'like_count') {
            return $this->withCount('likes')->orderBy('likes_count', 'desc');
        }
    }

}
