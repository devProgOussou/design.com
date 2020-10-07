<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'comments',
        'comments_id'
    ];
//    public function post()
//    {
//        return $this->belongsTo('App\post');
//    }
//    public function comments()
//    {
//        return $this->belongsTo('App\Comments');
//    }
//    public function users()
//    {
//        return $this->hasMany(post::class);
//    }
}
