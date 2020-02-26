<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

                    break;
                case 'news':

                    break;
            }
        }
        return view('admin.news', ['category' => DB::table('category')->get()]);
    }

    public function test2()
    {
        return view('admin.test2');

    }

}
