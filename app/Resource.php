<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['url'];

    public static function rules() {
        return [
            'url' => "required|min:10|unique:resources|active_url|regex:/.rss$/",
        ];
    }

    public static function attributeNames() {
        return [
            'url' => "Укажите ресурс"
        ];
    }
}
