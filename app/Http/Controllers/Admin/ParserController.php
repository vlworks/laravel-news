<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

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
}
