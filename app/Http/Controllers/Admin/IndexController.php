<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\oldNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');

    }

    private function rus2translit($string) {
        $converter = [
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        ];
        return strtr($string, $converter);
    }

    private function translite ($str) {
        // переводим в транслит
        $str = $this->rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

    public function news(Request $request)
    {
        if (isset($request->add)){
            $request->flash();
            switch ($request->add){
                case 'category':
                    $categoryName = $request->categoryName;
                    $transStr = $this->translite($categoryName);
                    DB::table('category')->insert([
                        'category' => $categoryName,
                        'name' => $transStr
                    ]);
                    return redirect()->route('admin.news')->with('success', 'Категория добавлена');
                    break;
                case 'news':
                    // Добавляем изображение
                    $url = 'default';
                    if ($request->hasFile('image')) {
                        $path = Storage::putFile('public', $request->file('image'));
                        $url = Storage::url($path);
                    }
                    // Добавялем даныне в БД
                    DB::table('news')->insert([
                        'title' => $request->newsHeader,
                        'text' => $request->newsText,
                        'isPrivate' => $request->isPrivate,
                        'image' => $url
                    ]);
                    return redirect()->route('admin.news')->with('success', 'Новость добавлена');
                    break;
            }
        }
        return view('admin.news', ['category' => Category::all()]);
    }

    public function test2()
    {
        return view('admin.test2');

    }

}
