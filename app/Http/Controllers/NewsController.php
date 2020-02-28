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
            'news' => News::all()->sortByDesc('id')]);
    }

    public function categoryId($id)
    {
        $news = [];

        foreach (oldNews::$category as $item) {
           if ($item['name'] == $id) $id = $item['id'];
        }

        if (array_key_exists($id, oldNews::$category)) {
            $name = oldNews::$category[$id]['category'];
            foreach (oldNews::$news as $item) {
                if ($item['category_id'] == $id)
                    $news[] = $item;
            }
            return view('news.onecategory', ['news' => $news, 'category' => $name]);
        } else
            return redirect(route('news.categories'));

    }

    public function categories()
    {
        return view('news.category', ['categories' => Category::all()]);
    }

    public function newsOne($id)
    {
        $testId = DB::select('SELECT * FROM news WHERE id = :id', ['id' => $id]);
        //$testId = DB::table('news')->where('id', $id)->get(); проверить объект на пустоту ? find() - не работает
        if ($testId){
            return view('news.one', ['news' => $testId[0]]);
        }
        else {
            return redirect(route('news.all'));
        }

    }


}
