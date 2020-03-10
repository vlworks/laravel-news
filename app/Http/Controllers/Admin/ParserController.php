<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(){

        $xml = XmlParser::load('https://www.cbr-xml-daily.ru/daily_utf8.xml');
        $data = $xml->parse([
            'item' => [
                'uses' => 'Valute[Name,Value]'
        ]
        ]);

        $this->insertDB($data['item'], 'Валюты');
        session()->get('success', 'Успешно добавлена 1 случайная строка из парсинга в новости Валюты');
        return view('admin.parser', [
            'data' => $data['item'],
        ]);
    }

    public function insertDB($data, $category){
        $newCategory = Category::query()
            ->where('category', $category)
            ->first();
        if (empty($newCategory)){
            $newCategory = new Category();
            $newCategory->fill([
                'category' => 'Валюты',
                'name' => 'valute'
            ]);
            $newCategory->save();
        }

        $rand = Rand(1, (count($data) - 1));

        $news = new News();
        $news->fill([
            'title' => $data[$rand]['Name'],
            'text' => $data[$rand]['Value'],
            'category_id' => $newCategory->id
        ]);
        $news->save();
    }
}
