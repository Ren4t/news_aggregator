<?php

use App\Http\Controllers\Admin\IndexControllerM;
use App\Http\Controllers\HomeControllerM;
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

Route::get('/',[HomeControllerM::class,'index']);
Route::get('/admin',[IndexControllerM::class,'index']);
Route::get('/test',[IndexControllerM::class,'test1']);
Route::get('/test',[IndexControllerM::class,'test2']);

Route::get('/hello/{name}', static function(string $name): string {
    return " Hello,{$name}";
});
Route::get('/info', static function(): string {
    return " information";
});
//Route::get('/news/{id}', static function(string $id): string {
//    return " news #id{$id}";
//});
Route::get('/newsM', [NewsControllerM::class,'news']);
Route::get('/newsM/{id}', [NewsControllerM::class,'newsOne']);

Route::group(['prefix' => 'guest'], static function(){
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->name('news.show')
        ->where('id','\d+');
});