<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Jobs\NewsParsing;
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
        $link = Resource::query()
            ->select('url')
            ->get();

        foreach ($link as $uri){
            //$parser->saveNews($uri->url);
            NewsParsing::dispatch($uri->url);
        }
        echo <<<HERE
            <p>Задачи для парсинга поставлены в очередь</p>
            <a href="parser">Вернуться</a>
HERE;

    }
}
