<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use function back;
use function redirect;
use function response;
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
    public function store(CreateRequest $request) {


        $data = $request->only(['category_id', 'title', 'author', 'status', 'description']);
        $news = new News($data);

        $url = null;
        if ($request->file('img_url')) {
            $path = Storage::putFile('public/img', $request->file('img_url'));
            $url = Storage::url($path);
        }
        //необходимо  в модели указать список полей которые нужно менять 
        $news->image = $url;
        // переопределить поле $fillable
        if ($news->save()) {
            return redirect()->route('admin.news.index', $news->id)->with('success', 'Новость успешно добавлена');
        }
        return back()->with('error', 'Новость не удалось добавить');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View {
        $categories = Category::all();
        return view('admin.news.edit')->with([
                    'categories' => $categories,
                    'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, News $news) {
       //dd($news);
        //правила валидации в классе Edit
        $data = $request->only(['category_id', 'title', 'author', 'status', 'description']);
        $news->fill($data);
         //необходимо  в модели указать список полей которые нужно менять 
        // переопределить поле $fillable
        //if (Auth::user()->is_admin){выполнять блок если админ} но лучше использовать посредника IsAdmin
        if ($request->file('img_url')) {
            $request->validate([ //если приходит картинка идет валидация
                'img_url' => ['sometimes', 'image', 'mimes:jpeg,bmp,png|max1500'],
            ]);
            $path = Storage::putFile('public/img', $request->file('img_url'));
            $url = Storage::url($path);
            
            $oldPath = str_replace('/storage', 'public', $news->image);
            //dd($oldPath);
            Storage::delete($oldPath);
            //dd($path, $url);
            $news->image = $url;
        }
       
        if ($news->save()) {
            return redirect()->route('admin.news.index', $news->id)->with('success', 'Новость успешно изменена');
        }
        return back()->with('error', 'Новость не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news) {
       try{
           $oldPath = str_replace('/storage', 'public', $news->image);
            //dd($oldPath);
            Storage::delete($oldPath);
           $news->delete();
            
           return response()->json('ok');
       } catch (Exception $ex) {
           Log::error($ex->getMessage(), $ex->getTrace());
           return response()->json('error', 400);
       }
    }

}
