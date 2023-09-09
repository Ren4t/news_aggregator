<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::view('/','welcome');

Route::get('/news',[NewsController::class, 'index']) //'index' метод в классе NewsController
        ->name('news.index');
Route::get('news/{id}',[NewsController::class,'show']) // url news/{id}
        ->where('id','\d+') // 'id','\d+' регулярное выражени говорит что 'id' должно быть числом 
        ->name('news.show'); // 'news.show' имя роута
Route::get('news/categories',[NewsController::class,'categories']) 
        ->name('news.categories'); 
Route::group(['prefix'=>'admin', 'as' => 'admin.'], function (){ // 'prefix'=>'admin' к url добавится префикс admin/
//'as' => 'admin.'  для всех роутов будет префикс admin.
    Route::get('/', AdminController::class)->name('index');
    Route::resource('categories', AdminCategoryController::class);// url admin/categories/
    Route::resource('news', AdminNewsController::class);// url admin/news/
});