<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', IndexController::class)->name('index');
Route::name('news.')
        ->prefix('news')
        ->group(function () {
            Route::get('/', [NewsController::class, 'index']) //'index' метод в классе NewsController
            ->name('index');
            Route::get('/{news}', [NewsController::class, 'show']) // url news/{id} {name} - имя модели, ларавел извлечет первичный ключ сам
            ->name('show'); // 'news.show' имя роута     
        });
Route::name('category.')
        ->prefix('categories')
        ->group(function () {
            Route::get('/', [CategoryController::class, 'index'])
            ->name('index');
            Route::get('/{category}', [CategoryController::class, 'show'])
            ->name('show');
        });
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','is.admin']], function () { // 'prefix'=>'admin' к url добавится префикс admin/
//'as' => 'admin.'  для всех роутов будет префикс admin.
    Route::get('/', AdminController::class)->name('index');
    Route::get('/parser', App\Http\Controllers\Admin\ParserController::class)->name('parser');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::get('users/toggleAdmin/{user}', [UserController::class, 'toggleAdmin'])
            ->name('toggleAdmin');
    Route::resource('users', UserController::class);
});

// для аутентификации через вк
Route::group(['middleware' => 'guest'], function(){ //роут будет работать только если гость
    Route::get('/vkontakte/redirect',[SocialProvidersController::class,'redirect'])
            ->name('social-providers.redirect');
    Route::get('/vkontakte/callback',[SocialProvidersController::class,'callback'])
            ->name('social-providers.callback');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
