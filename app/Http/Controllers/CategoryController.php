<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    //use NewsTrait;
    public function index(): View {
        
        $categories = Category::all();
        
        
        return \view('category.index',[
            'categories' => $categories
        ]);
    }
    public function show(Category $category): View{
        
        //dd($this->getNews($id));
        $news = News::query()->where('category_id','=',$category->id)->get();
        return \view('category.show')->with([
            'category' => $category,
            'newsList' => $news
        ]);
    }
}
