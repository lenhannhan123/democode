<?php

use App\Http\Controllers\Bookcontroller;
use App\Http\Controllers\Usercontroller;
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

Route::get('/', [Bookcontroller::class,'indexbook'])->name('library');



Route::get('/login',[Usercontroller::class,'login'])->name('login');
Route::post('/checklogin',[Usercontroller::class,'checklogin']);

Route::get('/logout',[Usercontroller::class,'logout'])->name('logout');


Route::prefix('admin')->middleware('checklogin:admin')->group(function() {
             Route::get('/home',[Usercontroller::class,'gethome'])->name('adminhome');
            Route::get('/book',[Bookcontroller::class,'getbook'])->name('book');
            Route::get('/book/create',[Bookcontroller::class,'create'])->name('createbook');
            Route::post('/book/create/createbook',[Bookcontroller::class,'createbook']);
            Route::get('/book/review/{id}',[Bookcontroller::class,'getbyid']);
            Route::get('/book/edit/{id}',[Bookcontroller::class,'edit'])->name('editboook');
            Route::post('/book/edit/editbook',[Bookcontroller::class,'editbook']);
            Route::get('book/delete/{id}',[Bookcontroller::class,'delete']);

            Route::get('/user',[Usercontroller::class,'getuser'])->name('user');
            Route::get('/user/create',[Usercontroller::class,'create'])->name('createuser');
            Route::post('/user/create/createbook',[Usercontroller::class,'createuser']);
            Route::get('/user/review/{id}',[Usercontroller::class,'getbyid']);
            Route::get('/user/edit/{id}',[Usercontroller::class,'edit'])->name('edituser');
            Route::post('/user/edit/edituser',[Usercontroller::class,'edituser']);
            Route::get('/user/delete/{id}',[Usercontroller::class,'deleteuser']);
});

Route::prefix('user')->middleware('checklogin:admin,user')->group(function() {

    Route::get('/index',[Usercontroller::class,'userindex'])->name('userindex');
});