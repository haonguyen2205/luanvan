<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Typecontroller as TypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;


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

Route::get('/','HomeController@index');
Route::get('/rooms','RoomController@rooms');
Route::get('/contact','ContactController@contact');
Route::get('/login','LoginController@login');
Route::get('/news','NewController@news');
Route::get('/about-us','AboutController@about');
Route::get('/cart/{id}','CartController@cart');
Route::post('/postCart','CartController@postCart')->name('checkout');

///đăng kí ()
Route::get('/showregister','RegisterController@showRegister');

Route::post('/register','RegisterController@register');
// login // logout
Route::post('/checklogin',[LoginController::class,'checkLogin']);

Route::get('/logout',[LoginController::class,'logoutAction']);

// ajax dat phong
Route::get('/findroomName','OrderController@findroomName');

Route::get('/findPrice','OrderController@findPrice');


// manager
route::get('/admin','admincontroller@index');

Route::get('/add-type', [TypeController::class, 'showPageAdd']);

// manager loại phòng
Route::post('/add-type-action', [TypeController::class, 'addTypeAction']);

Route::get('/list-type', [TypeController::class, 'listType']);

Route::get('/delete-type/{id}', [TypeController::class, 'deleteType']);

Route::get('/inactive-type/{id}', [TypeController::class, 'inactiveType']);

Route::get('/active-type/{id}', [TypeController::class, 'activeType']);

Route::get('/edit-type/{id}', [TypeController::class, 'showPageEdit']);

Route::post('/update-type/{id}', [TypeController::class, 'update']);

/// quản lý phòng
Route::get('/add-room', [RoomController::class, 'showPageAdd']); //hiển thị trang thêm

Route::post('/add-room-action', [RoomController::class, 'addRoomAction']); //hành động thêm vào csdl

Route::get('/list-room', [RoomController::class, 'listRoom']);

Route::get('/inactive-room/{id}', [RoomController::class, 'inactiveRoom']);

Route::get('/active-room/{id}', [RoomController::class, 'activeRoom']);

Route::get('/edit-room/{id}', [RoomController::class, 'showPageEdit']);

Route::post('/update-room/{id}', [RoomController::class, 'update']);

route::get('/delete_room/{id}', [RoomController::class, 'delete']);

Route::post('/search-room', [RoomController::class, 'search']);

// quản lý nhân viên

route::get('/page_add_staff',[StaffController::class,'addpage_staff']);

route::post('/add_staff',[StaffController::class,'add_staff']);

route::get('/list_staff',[StaffController::class,'list_staff']);

route::get('/edit_staff/{id}',[StaffController::class,'showPageEdit']);

Route::post('/update_staff/{id}', [StaffController::class, 'update_staff']);

route::get('/delete_staff/{id}', [StaffController::class, 'delete_staff']);

//đặt phòng// đớn đặt phòng
Route::get('/order_room',[OrderController::class,'add_order_page']);
Route::get('/admin/manage-order','Admin\AdminDonhangController@index');


// quản lý trang tin tức
Route::get('/list-new', [NewController::class, 'listNew']);

Route::get('/add-new', [NewController::class, 'showPageAddNew']);

// quản lý danh mục
Route::get('/list-cat', [CategoryController::class, 'listCat']);
Route::get('/add-cat', [CategoryController::class, 'addCat']);
Route::post('/add-cat-action', [CategoryController::class, 'addCatAction']);
Route::get('/edit-cat/{id}', [CategoryController::class, 'editCat']);
Route::post('/update-cat/{id}', [CategoryController::class, 'editCatAction']);
route::get('/delete-cat/{id}', [CategoryController::class, 'deleteCatAction']);

//trang thong tin cua khach hang
route::get('/profile',[CustomerController::class,'show_page_profile']);

route::get('/list-users',[CustomerController::class,'list_cus']);
