<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'image', 'post_id'];

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_category', 'category_id', 'post_id');
    }


}
