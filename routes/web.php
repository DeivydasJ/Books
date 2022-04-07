<?php
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LogoController;

Route::get('/', [BooksController::class, 'index']);
Route::get('/add-book', [BooksController::class, 'addBook']);
Route::post('/store', [BooksController::class,'storeBook']);
Route::get('/all-books', [BooksController::class, 'allBooks']);
Route::get('/show-book', [BooksController::class, 'showBook']);

Route::get('/add-category', [CategoryController::class, 'addCategory']);
Route::post('/create', [CategoryController::class, 'createCategory']);

Route::get('/delete/book/{book}', [BooksController::class, 'deleteBook']);
Route::get('/update/book/{book}', [BooksController::class, 'updateBook']);
Route::post('/update/{book}', [BooksController::class, 'storeUpdate']);

Route::get('/delete/category/{category}', [CategoryController::class, 'deleteCategory']);
Route::get('/update/category/{category}', [CategoryController::class, 'updateCategory']);
Route::post('/updateCategory/{category}', [CategoryController::class, 'storeUpdate']);

Auth::routes();

Route::get('/book/{book}', [BooksController::class, 'showBook']);

Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');



Route::post('/book/{book}/comment', [CommentController::class,'create']);


Route::get('/add-logo', [LogoController::class, 'addLogo']);
Route::post('/storelogo', [LogoController::class,'storeLogo']);

Route::get('/home', [BooksController::class, 'allBooks']);