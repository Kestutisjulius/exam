<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as U;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\MenuController as M;
use App\Http\Controllers\DishController as D;
use App\Http\Controllers\OrderController as O;
use App\Http\Controllers\FrontController as F;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//USER
Route::get('/user/create', [U::class, 'create'])->name('user_create')->middleware('role:admin');
Route::post('/user', [U::class, 'store'])->name('user_store')->middleware('role:admin');
Route::get('/users', [U::class, 'index'])->name('users_index')->middleware('role:user');
Route::get('/user/edit/{user}', [U::class, 'edit'])->name('user_edit')->middleware('role:admin');
Route::put('/user/update/{user}', [U::class, 'update'])->name('user_update')->middleware('role:admin');
Route::delete('/user/{user}', [U::class, 'destroy'])->name('user_delete')->middleware('role:admin');
//Restaurant
Route::get('/restaurant/create', [R::class, 'create'])->name('r_c')->middleware('role:admin');
Route::post('/restaurant', [R::class, 'store'])->name('r_s')->middleware('role:admin');
Route::get('/restaurants', [R::class, 'index'])->name('r_i')->middleware('role:user');
Route::get('/restaurant/edit/{restaurant}', [R::class, 'edit'])->name('r_e')->middleware('role:admin');
Route::put('/restaurant/update/{restaurant}', [R::class, 'update'])->name('r_u')->middleware('role:admin');
Route::delete('/restaurant/{restaurant}', [R::class, 'destroy'])->name('r_d')->middleware('role:admin');
//Menu
Route::get('/menu/create', [M::class, 'create'])->name('m_c')->middleware('role:admin');
Route::post('/menu', [M::class, 'store'])->name('m_s')->middleware('role:admin');
Route::get('/menus', [M::class, 'index'])->name('m_i')->middleware('role:user');
Route::get('/menu/edit/{menuId}', [M::class, 'edit'])->name('m_e')->middleware('role:admin');
Route::put('/menu/update/{menu}', [M::class, 'update'])->name('m_u')->middleware('role:admin');
Route::delete('/menu/{menu}', [M::class, 'destroy'])->name('m_d')->middleware('role:admin');
//Dish
Route::get('/dish/create', [D::class, 'create'])->name('d_c')->middleware('role:admin');
Route::post('/dish', [D::class, 'store'])->name('d_s')->middleware('role:admin');
Route::get('/dishs', [D::class, 'index'])->name('d_i')->middleware('role:user');
Route::get('/dish/edit/{dishId}', [D::class, 'edit'])->name('d_e')->middleware('role:admin');
Route::put('/dish/update/{dish}', [D::class, 'update'])->name('d_u')->middleware('role:admin');
Route::delete('/dish/{dish}', [D::class, 'destroy'])->name('d_d')->middleware('role:admin');
Route::put('/dishes/photo/delete/{dish}', [D::class, 'del'])->name('d_p')->middleware('role:admin');
//Order
Route::post('/order/{uId}', [O::class, 'store'])->name('order')->middleware('role:user');
Route::get('/my/orders', [O::class, 'index'])->name('orders')->middleware('role:user');
//Front
Route::get('/', [F::class, 'index'])->name('f_i');
