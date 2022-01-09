<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Achievement extends Model
{
    protected $fillable = [
        'article_id',
        'achievement',
        'study',
        'enthusiasm',
        'cause',
        'solution',
    ];

    public function articles(): HasOne
    {
        return $this->hasOne('App\Article');
    }
}
