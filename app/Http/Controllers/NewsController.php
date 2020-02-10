<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $arhive = [
        [
            'id' => 1,
            'header' => 'Новость 1',
            'text' => 'Подробный текст новости под номером 1',
            'categories' => 'Категория 1'
        ],
        [
            'id' => 2,
            'header' => 'Новость 2',
            'text' => 'Подробный текст новости под номером 2',
            'categories' => 'Категория 2'
        ],
        [
            'id' => 3,
            'header' => 'Новость 3',
            'text' => 'Подробный текст новости под номером 3',
            'categories' => 'Категория 2'
        ],
        [
            'id' => 4,
            'header' => 'Новость 4',
            'text' => 'Подробный текст новости под номером 4',
            'categories' => 'Категория 3'
        ],
        [
            'id' => 5,
            'header' => 'Новость 5',
            'text' => 'Подробный текст новости под номером 5',
            'categories' => 'Категория 3'
        ],
        [
            'id' => 6,
            'header' => 'Новость 6',
            'text' => 'Подробный текст новости под номером 6',
            'categories' => 'Категория 3'
        ],
        [
            'id' => 7,
            'header' => 'Новость 7',
            'text' => 'Подробный текст новости под номером 7',
            'categories' => 'Категория 4'
        ],
        [
            'id' => 8,
            'header' => 'Новость 8',
            'text' => 'Подробный текст новости под номером 8',
            'categories' => 'Категория 4'
        ],
        [
            'id' => 9,
            'header' => 'Новость 9',
            'text' => 'Подробный текст новости под номером 9',
            'categories' => 'Категория 4'
        ],
        [
            'id' => 10,
            'header' => 'Новость 10',
            'text' => 'Подробный текст новости под номером 10',
            'categories' => 'Категория 4'
        ],

    ];
    private $categories = []; /* для сбора всех категорий и проверки при обходе массива */


    public function index() {

        $home = route('home');
        $news = route('news');

        $html = <<<php
            <a href='{$home}'>Главная</a>
            <a href='{$news}'>Новости</a>
            <h1>Категории новостей</h1>
php;

        foreach ($this->arhive as $item) {

            // Обходим массив, собираем категории для вывода
            if(in_array($item['categories'], $this->categories)) {
                continue;
            }
            $this->categories[] = $item['categories'];

            // Записываем индекс для текущей категории в массиве $categories и используем его в ссылке
            $idxCategories = array_search($item['categories'], $this->categories);

            // Формируем вывод
            $html .= <<<php
                <a href = '{$news}/{$idxCategories}'>{$item['categories']}</a><br>
php;


        }
        return $html;

    }

    public function inCategory($id) {

        $home = route('home');
        $news = route('news');

        // Велосипед, не додумал как передать уже массив сформированный с категориями (с БД был бы другой подход)
        // может еще переделаю логику
        foreach ($this->arhive as $item) {
            if (in_array($item['categories'], $this->categories)) {
                continue;
            }
            $this->categories[] = $item['categories'];
        }
        $someHTML = '';
        // Обходим массив для сбора новостей по категории
        foreach ($this->arhive as $item) {
            if ($item['categories'] === $this->categories[$id]) {
                 $someHTML .= <<<php
                    <a href = '/onenews/{$item['id']}'>{$item['header']}</a><br>
php;

            }
        }

        $html = <<<php
            <a href='{$home}'>Главная</a>
            <a href='{$news}'>Новости</a>
            <h1>Новости - {$this->categories[$id]}</h1>
php;
        $html .= $someHTML;
        return $html;
    }

    public function oneNews($id) {

        $home = route('home');
        $news = route('news');

        foreach ($this->arhive as $item){
            if ($item['id'] == $id){
                $oneNews = $item;
            }
        }

        $html = <<<php
            <a href='{$home}'>Главная</a>
            <a href='{$news}'>Новости</a>
            <h1>{$oneNews['header']}</h1>
            <p>{$oneNews['text']}</p>
            <small>{$oneNews['categories']}</small>
            <br>
            <small><a href = '{$_SERVER['HTTP_REFERER']}'> <<<Назад </a></small>
php;

        return $html;
    }
}
