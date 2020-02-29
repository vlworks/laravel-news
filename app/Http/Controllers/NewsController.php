<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\oldNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function news()
    {
        return view('news.all', [
            'news' => News::query()
                ->where('isPrivate', false)
                ->orderBy('id', 'desc')
                ->paginate(5)]);
    }

    public function categoryId($id)
    {
        $cat = Category::query()->select(['id', 'category'])->where('name', $id)->get();
        $news = Category::query()->find($cat[0]->id)->news()->paginate(5);

        return view('news.onecategory', ['news' => $news, 'category' => $cat[0]->category]);
    }

    public function categories()
    {
        return view('news.category', ['categories' => Category::all()]);
    }

    public function newsOne(News $news)
    {
        return view('news.One', ['news' => $news]);
    }


}
