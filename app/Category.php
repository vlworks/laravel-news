<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category', 'name'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }
}
