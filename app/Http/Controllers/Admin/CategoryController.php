<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function ddd;
use function view;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $categories = Category::all();
        //dd($categories);
        return view('admin.categories.index', ['categoriesList' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // dd(app());
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\Category\CreateRequest $request) {
        $data = $request->only(['title', 'description']);
        $category = new Category($data);

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно добавлена');
        }
        return back()->with('error', 'Категорию не удалось добавить');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        return 'show category';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) {
        return view('admin.categories.edit')->with([
                    'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\Category\EditRequest $request, Category $category) {
        $data = $request->only(['title', 'description']);
        $category->fill($data);

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно изменена');
        }
        return back()->with('error', 'Категорию не удалось изменить');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {

        try {
            $category->delete();
            return response()->json('ok');
        } catch (Exception $ex) {
            Log::error($ex->getMessage(), $ex->getTrace());
            return response()->json('error', 400);
        }
    }

}
