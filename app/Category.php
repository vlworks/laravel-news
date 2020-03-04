<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category', 'name'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
            'category' => 'required|min:5|max:255',
        ];
    }

    public static function attributeNames() {
        return [
            'category' => 'Назовите категорию',
        ];
    }
}
