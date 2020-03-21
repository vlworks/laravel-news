<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['url'];

    public static function rules() {
        $tableNameCategory = (new Resource())->getTable();
        return [
            'url' => "required|min:10|unique:resources",
        ];
    }

    public static function attributeNames() {
        return [
            'url' => "Укажите ресурс"
        ];
    }
}
