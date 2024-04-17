<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\BookController;
use App\http\controllers\AdminController;
use App\http\controllers\UserController;
use App\http\controllers\CategoryController;
use App\http\controllers\BorrowController;
use App\http\controllers\CollectionController;


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
// Login register User
Route::middleware('Guest')->group(function() {
Route::get('/',[UserController::class, 'login'])->name('login');
Route::post('/register',[UserController::class, 'register'])->name('register');
Route::post('/login/auth',[UserController::class,'auth'])->name('login.auth');
});

// ADMIN DASHBOARD:
Route::middleware(['Login', 'Role:Admin'])->group(function(){

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/userList',[AdminController::class,'userList'])->name('userList');
Route::get('/addUser',[AdminController::class,'addUser'])->name('addUser');

// crud user
Route::post('/registerUser',[AdminController::class, 'registerUser'])->name('registerUser');
Route::post('/deleteUser/{id}',[AdminController::class, 'destroyUser'])->name('destroyUser');
Route::get('/editUser/{id}',[AdminController::class, 'editUser'])->name('editUser');
Route::post('/editUser/{id}',[AdminController::class, 'updateUser'])->name('updateUser');

// crud buku
Route::get('/book',[BookController::class,'bookList'])->name('bookList');
Route::get('/addBook',[BookController::class, 'addBook'])->name('addBook');
Route::post('/createBook',[BookController::class, 'createBook'])->name('createBook');
Route::get('/detail/{id}',[BookController::class, 'bookDetail'])->name('bookDetail');

// category
Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::get('/addCategory',[CategoryController::class,'addCategory'])->name('addCategory');
Route::post('/createCategory',[CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('/deleteCategory/{id}',[CategoryController::class, 'destroyCategory'])->name('destroyCategory');

});

// USER DASHBOARD ::
Route::middleware(['Login', 'Role:user'])->group(function(){

//dashboard
Route::get('/dashboardUser',[UserController::class, 'dashboardUser'])->name('dashboardUser');
Route::get('/collection',[collectionController::class, 'collection'])->name('collection');

//peminjaman
Route::get('/userBook',[BorrowController::class,'userBook'])->name('userBook');
Route::get('/detailBook/{id}',[BorrowController::class,'detailBook'])->name('detailBook');
Route::post('/borrowBook',[BorrowController::class,'borrowBook'])->name('borrowBook');
});


Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/error', [UserController::class, 'error'])->name('error');
