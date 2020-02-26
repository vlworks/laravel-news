<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {

        return view('admin.index');

    }

    public function news(Request $request)
    {
        $result = $request->only('add');
        if ($result['add']){
            $request->flash();
            switch ($result['add']){
                case 'category':
                    $content = \File::get('categories.json');
                    $json = json_decode($content, true);
                    $json[] = $request->except('add', '_token');
                    dump($json);
                    \File::put('categories.json', json_encode($json, JSON_UNESCAPED_UNICODE));
                    break;
                case 'news':
                    $content = \File::get('news.json');
                    $json = json_decode($content, true);
                    $json[] = $request->except('add', '_token');
                    dump($json);
                    \File::put('news.json', json_encode($json, JSON_UNESCAPED_UNICODE));
                    dump($request->except('add', '_token'));
                    break;
            }
        }
        return view('admin.news', ['category' => News::$category]);
    }

    public function test2()
    {
        return view('admin.test2');

    }

}
