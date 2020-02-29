<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'isPrivate', 'image'];

    public  function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
}
