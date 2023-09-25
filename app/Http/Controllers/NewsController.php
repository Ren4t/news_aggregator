<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use function view;

final class NewsController extends Controller
{
//    use NewsTrait;
    public function index(): View {
        
        $news = DB::table('news')
                ->join('categories','categories.id','=','news.category_id')
                ->select('news.*','categories.title as category_title')
                ->get();
        //dd($news); // var_dump() die()
        return view('news.index',[ // вернет шаблон resources/views/news/index.blade.php
            'newsList' => $news, // в шаблон передаст параметр 'newsList' 
            //который примет результат работы $this->getNews() в трейте NewsTrait
        ]);
    }
    
    public function show(int $id): View{
        $news = DB::table('news')->find($id);
        //dd($news);
        return view('news.show')->with([
            'news' => $news,
        ]);
    }  
}