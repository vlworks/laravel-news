<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $home = route('home');
        $news = route('news');

        return <<<php
        <a href='{$home}'>Главная</a>
        <a href='{$news}'>Новости</a>
        <h1>Добро пожаловать на главную страницу новостного портала</h1>
php;

    }
}
