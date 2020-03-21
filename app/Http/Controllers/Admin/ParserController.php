<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use App\Resource;
use App\Services\XMLParserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use SebastianBergmann\CodeCoverage\Report\PHP;

class ParserController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request, Resource::rules(), [], Resource::attributeNames());
            $resource = new Resource();
            $resource->fill($request->all())->save();
            $request->session()->flash('success', 'URL добавлен');
        }

        return view('admin.parser', [
            'resources' => Resource::all()
        ]);
    }

    public function deleteResource(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('admin.parser')->with('success', 'URL удален');
    }

    public function useParse(XMLParserService $parser){
        $date = now('c');
        echo <<<HERE
            <p>Парсинг начался</p>
            <p>$date</p>
            <br>
HERE;
        $link = Resource::query()
            ->select('url')
            ->get();

        foreach ($link as $uri){
            $data = $parser->saveNews($uri->url);
            $this->insertDbParsing($data);
        }
        $date = now('c');
        echo <<<HERE
            <p>Парсинг успешно завершен</p>
            <p>$date</p>
            <a href="parser">Вернуться</a>
HERE;

    }

    public function insertDbParsing($data)
    {
        $category = Category::query()->select('id')->where('category', $data['title'])->first();
        if (empty($category)){
            $category = new Category();
            $category->fill([
                'category' => $data['title'],
                'name' => $this->translite($data['title'])
            ])->save();
        }


        foreach ($data['news'] as $item){
            $news = News::query()->select('id')->where('title', $item['title'])->get();
            if ($news->isEmpty()){
                $news = new News();
                $news->fill([
                    'title' => $item['title'],
                    'text' => $item['description'],
                    'category_id' => $category->id
                ])->save();
            } else {
                continue;
            }
        }

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
}
