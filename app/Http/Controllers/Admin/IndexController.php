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

    public function news()
    {
        return view('admin.news', ['category' => News::$category]);
    }

    public function test2()
    {
        return view('admin.test2');

    }

}
