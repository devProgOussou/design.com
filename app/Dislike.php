<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    protected $fillable = [
        'post_id',
        'like',
        'user_id',
        'userDisLike'
    ];
}
