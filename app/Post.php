<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'post_category', 'post_id', 'category_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
