<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Declaration extends Model
{
    protected $fillable = [
        'article_id',
        'declaration',
    ];

    public function articles(): HasOne
    {
        return $this->hasOne('App\Article');
    }
}
