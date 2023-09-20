<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

final class NewsController extends Controller
{
    use NewsTrait;
    public function index(): View {
        //dd($this->getNews()); // var_dump() die()
        return \view('news.index',[ // вернет шаблон resources/views/news/index.blade.php
            'newsList' => $this->getNews(), // в шаблон передаст параметр 'newsList' 
            //который примет результат работы $this->getNews() в трейте NewsTrait
        ]);
    }
    
    public function show(int $id =null): View{
        //dd($this->getNews($id));
        return \view('news.show')->with([
            'news' => $this->getNews($id),
        ]);
    }  
}