<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    public static $news = [
        '1' => [
            'id' => 1,
            'title' => 'Новости спорта 1',
            'text' => 'А у нас новость спорта 1 и она очень хорошая!',
            'category_id' => 1,
            'isPrivate' => false
        ],
        '2' => [
            'id' => 2,
            'title' => 'Новости спорта 2',
            'category_id' => 1,
            'text' => 'А тут плохие новости спорта 2(((',
            'isPrivate' => false
        ],
        '3' => [
            'id' => 3,
            'title' => 'Новости политики 1',
            'text' => 'А у нас новость политики 1 и она очень хорошая!',
            'category_id' => 2,
            'isPrivate' => false
        ],
        '4' => [
            'id' => 4,
            'title' => 'Новости политики 2',
            'category_id' => 2,
            'text' => 'А тут плохие новости политики 2(((',
            'isPrivate' => false
        ],
        '5' => [
            'id' => 5,
            'title' => 'Новости спорта 3',
            'text' => 'А у нас новость спорта 3 и она очень хорошая!',
            'category_id' => 1,
            'isPrivate' => false
        ],
        '6' => [
            'id' => 6,
            'title' => 'Новости спорта 4',
            'category_id' => 1,
            'text' => 'А тут плохие новости спорта 4(((',
            'isPrivate' => false
        ],
        '7' => [
            'id' => 7,
            'title' => 'Новости политики 3',
            'text' => 'А у нас новость политики 3 и она очень хорошая!',
            'category_id' => 2,
            'isPrivate' => false
        ],
        '8' => [
            'id' => 8,
            'title' => 'Новости политики 4',
            'category_id' => 2,
            'text' => 'А тут плохие новости политики 4(((',
            'isPrivate' => false
        ],
        '9' => [
            'id' => 9,
            'title' => 'Новости спорта 5',
            'text' => 'А у нас новость спорта 5 и она очень хорошая!',
            'category_id' => 1,
            'isPrivate' => false
        ],
        '10' => [
            'id' => 10,
            'title' => 'Новости спорта 6',
            'category_id' => 1,
            'text' => 'А тут плохие новости спорта 6(((',
            'isPrivate' => false
        ],
        '11' => [
            'id' => 11,
            'title' => 'Новости политики 5',
            'text' => 'А у нас новость политики 5 и она очень хорошая!',
            'category_id' => 2,
            'isPrivate' => false
        ],
        '12' => [
            'id' => 12,
            'title' => 'Новости политики 6',
            'category_id' => 2,
            'text' => 'А тут плохие новости политики 6(((',
            'isPrivate' => false
        ],
        '13' => [
            'id' => 13,
            'title' => 'Новости спорта 7',
            'text' => 'А у нас новость спорта 7 и она очень хорошая!',
            'category_id' => 1,
            'isPrivate' => false
        ],
        '14' => [
            'id' => 14,
            'title' => 'Новости спорта 8',
            'category_id' => 1,
            'text' => 'А тут плохие новости спорта 8(((',
            'isPrivate' => false
        ],
        '15' => [
            'id' => 15,
            'title' => 'Новости политики 7',
            'text' => 'А у нас новость политики 7 и она очень хорошая!',
            'category_id' => 2,
            'isPrivate' => false
        ],
        '16' => [
            'id' => 16,
            'title' => 'Новости политики 8',
            'category_id' => 2,
            'text' => 'А тут плохие новости политики 8(((',
            'isPrivate' => false
        ],
    ];
    public static $category = [
        '1' => [
            'id' => 1,
            'category' => 'Спорт',
            'name' => 'sport'
        ],
        '2' => [
            'id' => 2,
            'category' => 'Политика',
            'name' => 'politics'
        ]
    ];
    public static function randNews()
    {
        $news = [];
        $news = DB::select('SELECT * FROM news WHERE 1 ORDER BY id DESC LIMIT 3');
        return $news;
    }
}
