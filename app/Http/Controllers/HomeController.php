<?php

namespace App\Http\Controllers;

use App\News;
use App\oldNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', ['news' => News::query()
            ->orderBy('id', 'desc')
            ->take(3)
            ->get()]);
    }

    public function login()
    {
        return view('login');
    }
}
