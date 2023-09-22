<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use function view;

final class NewsController extends Controller
{
//    use NewsTrait;
    public function index(): View {
        
       $news = News::query()->paginate(6);
        //dd($news); // var_dump() die()
        return view('news.index',[ // вернет шаблон resources/views/news/index.blade.php
            'newsList' => $news, // в шаблон передаст параметр 'newsList' 
            //который примет результат работы $this->getNews() в трейте NewsTrait
        ]);
    }
    
    public function show(News $news): View{
        //$news = $news->find($news);
        //dd($news);
        return view('news.show')->with([
            'news' => $news,
        ]);
    }  
}