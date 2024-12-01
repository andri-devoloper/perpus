<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


// Dashboard
// Route::get('dashboard', [HomeController::class, 'Index_Dashboard'])->name('dashboard');




// // Loggin
Route::get('login', [HomeController::class, 'Index_Login'])->name('login');
Route::post('create-login', [UserController::class, 'Create_Login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'Logout_User'])->name('logout')->middleware('auth');


// Route::get('dashboard', [HomeController::class, 'Index_Dashboard'])
//     ->name('dashboard')
//     ->middleware('role:super admin,administrator,user');

//     // Books Management (akses hanya untuk "super admin" dan "administrator")
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('dashboard', [HomeController::class, 'Index_Dashboard'])->name('dashboard');
// New Buku
    Route::get('new', [BooksController::class, 'Index_NewBook'])->name('new');
    Route::get('/get-category/{code_category}', [BooksController::class , 'Get_Category']);
    Route::post('/get-subs', [BooksController::class , 'Get_Subs'])->name('get.subs');
    Route::post('create/books', [BooksController::class, 'Create_Books'])->name('create.books');
    Route::put('update/books/{id}' , [BooksController::class, 'Update_Books'])->name('update.books');
    Route::delete('delete/books/{id}', [BooksController::class, 'Delete_Books'])->name('delete.books');

    // // List Books
    Route::get('book', [BooksController::class, 'List_Books'])->name('books');
    // Route::get('/books', [BooksController::class, 'List_Books'])->name('books.list');


    // // Categori
    Route::get('kategori', [CategoryController::class, 'Index_Category'])->name('category');
    Route::post('kategory/create', [CategoryController::class, 'Create_Category'])->name('create.category');
    Route::put('update/category/{id}', [CategoryController::class, 'Update_Category'])->name('update.category');
    Route::delete('delete/category/{id}', [CategoryController::class, 'Delete_Category'])->name('delete.category');

    // // Rak Buku
    Route::get('rak', [RackController::class, 'Index_Bookshelf'])->name('rak');
    Route::post('create/rak', [RackController::class, 'Create_Bookshelf'])->name('create.rak');
    Route::put('update/rak/{id}', [RackController::class, 'Update_Bookshelf'])->name('update.rak');
    Route::delete('delete/rak/{id}', [RackController::class, 'Delete_Bookshelf'])->name('delete.rak');

    // Sub Rak
    Route::get('sub', [RackController::class, 'Index_Sub'])->name('sub');

    // Show
    Route::get('sub/{id}', [ShowController::class, 'Show_SubRack'])->name('subs.show');
    Route::get('rack/{id}', [ShowController::class, 'Show_rack'])->name('rack.show');
    // Route::get('book/{id}', [ShowController::class, 'Show_Books'])->name('books.show');
    Route::get('category/{id}', [ShowController::class, 'Show_Category'])->name('category.show');
    Route::get('book/{id}', [ShowController::class, 'Show_Books'])->name('books.show');

    //

    // // Sub Buku
    Route::post('create/sub', [RackController::class, 'Create_Sub'])->name('create.sub');
    Route::put('update/sub/{id}', [RackController::class, 'Update_Sub'])->name('update.sub');
    Route::delete('delete/sub/{id}', [RackController::class, 'Delete_Sub'])->name('delete.sub');

    // // Borrow Books
    Route::get('pinjam', [BorrowController::class, 'Index_Borrow'])->name('pinjam');
    Route::get('/search-books', [BorrowController::class, 'Index_Borrow'])->name('search.books');
    Route::get('/books/search', [BorrowController::class, 'search'])->name('books.search');
    Route::post('borrow/submit', [BorrowController::class, 'Create_Borrow'])->name('borrow.submit');
    Route::get('borrowing-table', [BorrowController::class, 'Table_Borrow'])->name('borrowing.table');
    Route::post('/borrow/return-single/{borrow_id}/{book_id}', [BorrowController::class, 'Return_Borrow'])->name('borrow.return_single');
    Route::get('histori', [BorrowController::class, 'Index_Hisrori'])->name('histori');

    // // Profile
    Route::get('view-profile', [UserController::class, 'Index_View'])->name('view-profile');
    Route::get('user-profile', [UserController::class, 'Index_User'])->name('user-profile');

    // // User
    Route::post('create-user', [UserController::class, 'Create_User'])->name('create-user');
    Route::get('view-profile', [UserController::class, 'Index_View'])->name('view-profile');
    Route::put('/user/update/{id}', [UserController::class, 'Update_User'])->name('user.update');
    Route::put('/user/updateFoto/{id}', [UserController::class, 'Update_UserFoto'])->name('user.updatePhoto');

    // User List
    Route::get('user-list', [UserController::class, 'Index_UserList'])->name('user.list');
});

// Category Management (akses hanya untuk "super admin")
// Route::group(['middleware' => 'role:super admin'], function () {
//     Route::get('kategori', [CategoryController::class, 'Index_Category'])->name('category');
//     Route::post('kategory/create', [CategoryController::class, 'Create_Category'])->name('create.category');
//     Route::put('update/category/{id}', [CategoryController::class, 'Update_Category'])->name('update.category');
//     Route::delete('delete/category/{id}', [CategoryController::class, 'Delete_Category'])->name('delete.category');
// });

// Rute untuk pengguna "guest"
// Route::group(['middleware' => 'role:guest'], function () {
//     Route::get('view-profile', [UserController::class, 'Index_View'])->name('view-profile');
// });

// Error
Route::get('/404', function () {
    return view('errors.404');
});
