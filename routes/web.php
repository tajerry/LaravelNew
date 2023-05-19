<?php
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CommentController as CommentController;
use App\Http\Controllers\Admin\AdminController as AdminController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\CategoryController as CategoryController;

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

Route::get('/', function () {
    return view('welcome');
})
    ->name('home');
Route::get('/welcome/{name}',function ($name){
    echo 'Добро пожаловать, '.$name;
} );


Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->name('news.show')
    ->where('id', '\d+');
Route::get('/news/{category}', [CategoryController::class, 'showCategory'])
    ->name('news.category');

Route::resource('comment', CommentController::class);

//Admin routes
Route::group(['prefix'=>'admin', 'as'=>'admin.'],function(){
    Route::get('/', AdminController::class)
    ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

