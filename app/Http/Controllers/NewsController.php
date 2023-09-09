<?php
declare (strict_type=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;
    public function welcome() {
        return view(
                'news.welcome',[
                'news' => $this->getNews(),
                'categories' => $this->getCategories()
                ]
        );
    }
    public function showCategoryNews(int $id) {
        return view(
                'news.showCategoryNews',[
                'news' => $this->getNews(),
                'categories' => $this->getCategories($id)
                ]
        );
    }
    public function index() { 
      
       return view('news.index',[
           'news' => $this->getNews()
       ]);
    }
    public function show(int $id) {
        return view('news.show',[
            'news' => $this->getNews($id)
        ]);
    }
}
