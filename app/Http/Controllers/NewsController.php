<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{


    public function news()
    {
        return view('news.all', [
            'news' => DB::table('news')
                            ->orderBy('id', 'desc')
                            ->get()]);
    }

    public function categoryId($id)
    {
        $news = [];

        foreach (News::$category as $item) {
           if ($item['name'] == $id) $id = $item['id'];
        }

        if (array_key_exists($id, News::$category)) {
            $name = News::$category[$id]['category'];
            foreach (News::$news as $item) {
                if ($item['category_id'] == $id)
                    $news[] = $item;
            }
            return view('news.onecategory', ['news' => $news, 'category' => $name]);
        } else
            return redirect(route('news.categories'));

    }

    public function categories()
    {
        return view('news.category', ['categories' => DB::table('category')->get()]);
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
