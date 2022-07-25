<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::match(['get', 'post'], '/register', function () {
    return redirect('/login');
})->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//users
Route::resource('users', UserController::class);

//trash
Route::get('/categories/trash',[CategoryController::class, 'trash'])
->name('categories.trash');

//restore
Route::get('/categories/{id}/restore', [CategoryController::class,'restore'])
->name('categories.restore');

//deletepermanen
Route::delete('/categories/{category}/delete-permanent',
[CategoryController::class, 'deletePermanent'])
->name('categories.delete-permanent');

//category
Route::resource('categories', CategoryController::class);

//trash books
Route::get('/books/trash', [BookController::class, 'trash'])->name('books.trash');

//restore book
Route::post('/books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');

//delete permanen book
Route::delete('/books/{id}/delete-permanent', [BookController::class, 'deletePermanent'])->name('books.delete-permanent');

//manage book
Route::resource('books', BookController::class);

//ajax category
Route::get('/ajax/categories/search', [CategoryController::class, 'ajaxSearch']);
