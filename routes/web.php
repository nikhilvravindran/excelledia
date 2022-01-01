<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[App\Http\Controllers\FrontendController::class,'index'])->name('home');
Route::get('/read-blog/{id}',[App\Http\Controllers\FrontendController::class,'readBlog'])->name('read-blog');
Route::post('/add-comment',[App\Http\Controllers\FrontendController::class,'addComment'])->name('add-comment');
Route::get('/admin',[App\Http\Controllers\BackendController::class,'index'])->name('dashboard');
Route::get('/admin/list-blog',[App\Http\Controllers\BackendController::class,'listBlog'])->name('list-blog');
Route::get('/admin/add-blog',[App\Http\Controllers\BackendController::class,'addBlog'])->name('add-blog');
Route::post('/admin/create-blog',[App\Http\Controllers\BackendController::class,'createBlog'])->name('create-blog');

Route::get('/admin/edit-blog/{id}',[App\Http\Controllers\BackendController::class,'editBlog'])->name('edit-blog');
Route::get('/admin/delete-blog/{id}',[App\Http\Controllers\BackendController::class,'deleteBlog'])->name('delete-blog');
Route::post('/admin/update-blog/{id}',[App\Http\Controllers\BackendController::class,'updateBlog'])->name('update-blog');



