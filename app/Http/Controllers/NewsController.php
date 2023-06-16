<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = app(News::class);
        return view('news.index',[
            'newsList' => $news->getNews()
        ]);
    }
    public function show(int $id):mixed
    {
        $newsList = app(News::class);
        $news = $newsList->getNewsById($id);
        return view('news.show' , [
           'news' => $news
        ]);
    }
    public function category(int $id):mixed
    {
        $newsList = app(News::class);
        $news = $newsList->getNewsByCategoryId($id);
        return view('news.show' , [
            'news' => $news
        ]);
    }
}
