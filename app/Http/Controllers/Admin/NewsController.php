<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller {
    //use NewsTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $news = $news = DB::table('news')
                ->join('categories', 'categories.id', '=', 'news.category_id')
                ->select('news.*', 'categories.title as category_title')
                ->get();
        return view('admin.news.index', ['newsList' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        //dump(request()->old());
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //dd($request->all());
        if ($request->title == null || $request->img_url == null || $request->author == null || $request->description == null) {
            $request->flash();
            return redirect()->route('admin.news.create',[
                't'=>'danger',
                'm'=> 'Не все поля заполнены'
            ]);
        } else {
            DB::table('news')->insert([
                'category_id' => 1,
                'title' => $request->title,
                'image' => $request->img_url,
                'author' => $request->author,
                'status' => $request->status,
                'description' => $request->description,
                'created_at' => now(),
            ]);   
        }

        return redirect()->route('admin.news.create',[
                't'=>'info',
                'm'=> 'Добавление прошло успешно'
            ]);
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
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

}
