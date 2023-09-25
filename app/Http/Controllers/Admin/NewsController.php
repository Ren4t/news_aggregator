<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function redirect;
use function view;

class NewsController extends Controller {
    //use NewsTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View {
        $news = News::query()
                ->status() // задейтвует scopeStatus из модели
                ->with('category') //указывается отношение чтоб не делать много запросов в цикле в шаблоне
                //сделать один запрос а шаблон сам разберется
                ->orderByDesc('id')
                ->paginate(10)
                ->appends([
                    'f' => $request->f
                ]);
        //dd($news);
//        $news = $news = DB::table('news')
//                ->join('categories', 'categories.id', '=', 'news.category_id')
//                ->select('news.*', 'categories.title as category_title')
//                ->get();
        return view('admin.news.index', ['newsList' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        //dump(request()->old());
        $categories = Category::all();
        return view('admin.news.create')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->flash();
        //dd($request->all());
        $data = $request->only(['category_id', 'title', 'author', 'status', 'description']);
        $news = new News($data);
        
        $url = null;
        if($request->file('img_url'))
        {
            $path = Storage::putFile('public/img', $request->file('img_url'));
            $url = Storage::url($path);
        }
        //необходимо  в модели указать список полей которые нужно менять 
        $news->image = $url;
         // переопределить поле $fillable
        if($news->save()){
            return redirect()->route('admin.news.index', $news->id)->with('success', 'Новость успешно добавлена');
        }
            return back()->with('error', 'Новость не удалось добавить');
            
//        if ($request->title == null || $image_name == null || $request->author == null || $request->description == null) {
//            $request->flash();
//            return redirect()->route('admin.news.create', [
//                        't' => 'danger',
//                        'm' => 'Не все поля заполнены',//admin/news/create?t=danger&m=Не все поля заполнены
//                        's' => 'show'
//            ]);
//        } else {
//            DB::table('news')->insert([
//                'category_id' => 1,
//                'title' => $request->title,
//                'image' => asset('storage/' . $image_name),
//                'author' => $request->author,
//                'status' => $request->status,
//                'description' => $request->description,
//                'created_at' => now(),
//            ]);
//        }
//
//        return redirect()->route('admin.news.create', [
//                    't' => 'info',
//                    'm' => 'Добавление прошло успешно', // создаст get запрос localhost/admin/news/create?t=info&m=Добавление%20прошло%20успешно
//                    's' => 'show'
//        ]);
        // return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news) : View{
        $categories = Category::all();
        return view('admin.news.edit')->with([
            'categories' => $categories,
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news) {
        $request->flash();
        //dd($request->all());
        $data = $request->only(['category_id', 'title', 'author', 'status', 'description']);
        $news->fill($data);
        
        if($request->file('img_url'))
        {
            $path = Storage::putFile('public/img', $request->file('img_url'));
            $url = Storage::url($path);
            $news->image = $url;
        }
        //необходимо  в модели указать список полей которые нужно менять 
         // переопределить поле $fillable
        if($news->save()){
            return redirect()->route('admin.news.index', $news->id)->with('success', 'Новость успешно изменена');
        }
            return back()->with('error', 'Новость не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $Snews) {
        $news->delete();
        return redirect()->route('admin.news.index');
    }

}
