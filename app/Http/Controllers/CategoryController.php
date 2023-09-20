<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use NewsTrait;
    public function show(int $id = null): View{
        
        //dd($this->getNews($id));
        return \view('news.category',[
            'newsList' => $this->getNews(),
            'categories' => $this->getCategories()
        ]);
    }
}
