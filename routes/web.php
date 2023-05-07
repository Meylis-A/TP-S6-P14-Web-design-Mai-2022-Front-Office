<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',function(){
//     return view('articles.index');
// });

Route::get('/', [ArticlesController::class, 'index'])->name('home');
Route::get('/softland/blog-post/{url}', [ArticlesController::class, 'blog_post'])->name('blog-post');
Route::get('/softland/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::post('/softland', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('/softland/{url}/{article}', [ArticlesController::class, 'show'])->name('show');
Route::get('/softland/{article}', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::put('/softland/{article}', [ArticlesController::class, 'update'])->name('articles.update');
Route::delete('/softland/{article}', [ArticlesController::class, 'destroy'])->name('articles.destroy');
