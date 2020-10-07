<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 */
class post extends Model
{
    protected $fillable = [
        'name',
        'fname',
        'iamge',
        'description',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function likes()
    {
        return $this->belongsTo('App\Like');
    }
    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }
}
