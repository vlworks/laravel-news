<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use App\oldNews;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'news' => News::query()
                ->select('id', 'title')
                ->orderBy('id', 'desc')
                ->paginate(5),
            'users' => User::query()
                ->select('id', 'name', 'email', 'is_admin')
                ->orderBy('id', 'desc')
                ->paginate(5),
            ]);
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

    public function news(Request $request, News $news)
    {
        if($request->isMethod('post')){
            if (isset($request->add)){
                $request->flash();
                switch ($request->add){
                    case 'category':
                        $data = new Category();
                        $data->category = $request->category;
                        $data->name = $this->translite($request->category);
                        $data->save();

                        return redirect()->route('admin.news')->with('success', 'Категория добавлена');
                        break;
                    case 'news':
                        // Добавляем изображение
                        $url = 'default';
                        if ($request->hasFile('image')) {
                            $path = Storage::putFile('public', $request->file('image'));
                            $url = Storage::url($path);
                        }

                        $this->validate($request, News::rules(), [], News::attributeNames());

                        $news->fill($request->all());
                        $news->image = $url;
                        $news->save();

                        return redirect()->route('admin.news')->with('success', 'Новость добавлена');
                        break;
                }
            }
        }
        return view('admin.news', [
            'news' => $news,
            'category' => Category::all()
        ]);
    }

    public function deleteNews (News $news) {
        $news->delete();
        return redirect()->route('admin.admin')->with('success', 'Новость удалена');
    }

    public function editNews (News $news) {
        return view('admin.news', [
            'news' => $news,
            'category' => Category::all()
        ]);
    }

    public function saveNews (News $news, Request $request) {
        if($request->isMethod('post')){

            $this->validate($request, News::rules(), [], News::attributeNames());

            $news->fill($request->all());

            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }

            $news->save();

            return redirect()->route('admin.admin')->with('success', 'Новость изменена');
        }
    }

    public function test2()
    {
        return view('admin.test2');
    }

    /* ADMIN CONTROL */

    public function letAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return redirect()->route('admin.admin')->with('success', 'Права назначены');
    }

    public function removeAdmin(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return redirect()->route('admin.admin')->with('success', 'Права убраны');
    }

    /* USER CONTROL */

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.admin')->with('success', 'Пользователь удален');
    }

    public function editUser (User $user)
    {
        return view('admin.editUser', [
           'user' => $user
        ]);
    }

    public function saveUser (User $user, Request $request)
    {
        if ($request->isMethod('post')){
            $errors = [];
            $isEmail = User::query()
                ->select('id')
                ->where('email', '=', $request->email)
                ->get();
            if ($isEmail->isEmpty()){
                $user->fill($request->all())->save();
                return redirect()->route('admin.admin')->with('success', 'Пользователь изменен');
            } else {
                $errors['email'][] = 'Email занят';
                return redirect()->route('admin.editUser', ['user' => $user])->withErrors($errors);
            }
        }
    }

}
