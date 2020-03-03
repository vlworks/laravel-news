<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'isPrivate', 'image'];

    public  function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:5|max:255',
            'text' => 'required|max:5000',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'isPrivate' => 'integer',
            'image' => 'mimes:jpeg,bmp,png|max:1000'
        ];
    }

    public static function attributeNames() {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => "Категория новости",
            'image' => "Изображение"
        ];
    }
}
