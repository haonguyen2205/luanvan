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
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\MailController;

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
Route::get('/news/{id}','NewController@newcat');
Route::get('/about-us','AboutController@about');
Route::get('/cart/{id}','CartController@cart');
Route::post('/postCart','CartController@postCart')->name('checkout');
Route::post('datphong','CartController@datphong');

///đăng kí ()
Route::get('/showregister','RegisterController@showRegister');
Route::post('xulyphong','XuLyPhongController@index');

Route::post('/register','RegisterController@register');
// login // logout
Route::post('/checklogin',[LoginController::class,'checkLogin']);

Route::get('/logout',[LoginController::class,'logoutAction']);

// ajax dat phong
Route::get('/findroomName','OrderController@findroomName');
Route::get('/findPrice','OrderController@findPrice');

// manager
route::get('/admin','admincontroller@index');



//quản lý tiện ích
Route::get('/add-uti', [UtilityController::class,'ShowPageAdd_uti']);

Route::post('/add-uti-action', [UtilityController::class,'Add_uti']);

// Route::get('/list-uti', [UtilityController::class,'list_uti']);
Route::get('/list-uti', [UtilityController::class,'list_uti'])->name('list-uti.list_uti');

route::Get('/list-block-uti',[UtilityController::class,'list_uti_block']);

Route::get('/delete-uti/{id}', [UtilityController::class,'delete_uti']);

Route::get('/edit-uti/{id}', [UtilityController::class,'showPageEdit_uti']);

Route::post('/update-uti/{id}', [UtilityController::class,'update_uti']);

// quản lý loại phòng
Route::get('/add-type', [TypeController::class, 'showPageAdd']);

Route::post('/add-type-action', [TypeController::class, 'addTypeAction']);

Route::get('/list-type', [TypeController::class, 'listType']);

route::Get('/list-type-block',[TypeController::class,'list_type_block']);

Route::get('/delete-type/{id}', [TypeController::class, 'deleteType']);

Route::get('/inactive-type/{id}', [TypeController::class, 'inactiveType']);

Route::get('/active-type/{id}', [TypeController::class, 'activeType']);

Route::get('/edit-type/{id}', [TypeController::class, 'showPageEdit']);

Route::post('/update-type/{id}', [TypeController::class, 'update_cat']);
//ket thuc quan li loai phong

/// quản lý phòng
Route::get('/add-room', [RoomController::class, 'showPageAdd']); //hiển thị trang thêm

Route::post('/add-room-action', [RoomController::class, 'addRoomAction']); //hành động thêm vào csdl

Route::get('/list-room', [RoomController::class, 'listRoom']);

route::Get('/list-room-block',[RoomController::class, 'list_room_block']);

Route::get('/inactive-room/{id}', [RoomController::class, 'inactiveRoom']);

Route::get('/active-room/{id}', [RoomController::class, 'activeRoom']);

Route::get('/edit-room/{id}', [RoomController::class, 'showPageEdit']);

Route::post('/update-room/{id}', [RoomController::class, 'updateRoom']);

route::get('/delete_room/{id}', [RoomController::class, 'deleteRoom']);

Route::post('/search-room', [RoomController::class, 'search']);

Route::get('cat-search','CategoryController@catsearch');

Route::get('new-search','NewController@newsearch');

route::get('/check-availability',[RoomController::class, 'checkRoom'])->name('checkRoom');
//ket thuc quan ly phong

// quản lý nhân viên

route::get('/page_add_staff',[StaffController::class,'addpage_staff']);

route::post('/add_staff',[StaffController::class,'add_staff']);

route::get('/list_staff',[StaffController::class,'list_staff']);

route::Get('/list_staff/list-staff-block',[StaffController::class,'list_staff_block']);

route::get('/edit_staff/{id}',[StaffController::class,'showPageEdit']);

Route::post('/update_staff/{id}', [StaffController::class, 'update_staff']);

route::get('/delete-staff/{id}', [StaffController::class, 'delete_staff']);

route::post('/update-img',[StaffController::class, 'update_img']);

//diem danh nhân view
route::get('/diemdanh',[StaffController::class, 'diemdanh']);

route::get('/diemdanhra',[StaffController::class,'diemdanhra']);

//đặt phòng// đơn đặt phòng
//Route::get('/order_room',[OrderController::class,'add_order_page']);
//Route::get('/admin/manage-order','Admin\AdminDonhangController@index');
Route::get('/order_room',[OrderController::class,'add_order_page']);
Route::get('/admin/manage-order','Admin\AdminDonhangController@index');
Route::get('/admin/chitietorder/{id}','Admin\AdminDonHangController@chitiet');
Route::get('/admin/chitietorder}','Admin\AdminDonHangController@chitiet');
Route::get('back','Admin\AdminDonHangController@back');
Route::get('uptt/{id}','Admin\AdminDonHangController@update');
Route::get('thanhtoan/{id}','Admin\AdminDonHangController@thanhtoan');
Route::post('capnhat','Admin\AdminDonHangController@capnhat');
Route::post('checkout','Admin\AdminDonHangController@checkout');
Route::post('dichvu','Admin\AdminDonHangController@dichvu');
Route::get('xoa/{id}','Admin\AdminDonHangController@xoa');
Route::get('ds-xoa','Admin\AdminDonHangController@dsxoa');
Route::get('timkiem','Admin\AdminDonHangController@timkiem');
Route::get('/admin/huy/{id}','Admin\AdminDonHangController@huy');

// quản lý trang tin tức
//Route::get('/list-new', [NewController::class, 'listNew']);
//Route::get('/add-new', [NewController::class, 'showPageAddNew']);

Route::get('/list-new', [NewController::class, 'listNew']);
Route::get('/add-new', [NewController::class, 'showPageAddNew']);
Route::post('/post-add-new','NewController@postAddNew');
Route::get('/delete-new/{id}','NewController@delete');
Route::get('/edit-new/{id}','NewController@edit');
Route::post('/post-edit-new','NewController@postedit');

// quản lý danh mục
//Route::get('/list-cat', [CategoryController::class, 'listCat']);
///Route::get('/add-cat', [CategoryController::class, 'addCat']);
//Route::post('/add-cat-action', [CategoryController::class, 'addCatAction']);
//Route::get('/edit-cat/{id}', [CategoryController::class, 'editCat']);
//Route::post('/update-cat/{id}', [CategoryController::class, 'editCatAction']);
//route::get('/delete-cat/{id}', [CategoryController::class, 'deleteCatAction']);

Route::get('/list-cat', [CategoryController::class, 'listCat']);
Route::post('stt','CategoryController@stt');
Route::get('/add-cat', [CategoryController::class, 'addCat']);
Route::post('/add-cat-action', [CategoryController::class, 'addCatAction']);
Route::get('/edit-cat/{id}', [CategoryController::class, 'editCat']);
Route::post('/update-cat/{id}', [CategoryController::class, 'editCatAction']);
route::get('/delete-cat/{id}', [CategoryController::class, 'deleteCatAction']);
//trang thông tin cua khach hang
Route::get('/profile','CustomerController@show_page_profile');

Route::get('/profile-form', [CustomerController::class, 'show_page_profileDetail']);

Route::get('/profile-pass', [CustomerController::class, 'show_page_profilePass']);

route::post('/chance-pass',[CustomerController::class,'change_password']);

route::post('/chance-info',[CustomerController::class,'change_info']);

route::get('/profile/list-order',[CustomerController::class,'list_order']);

Route::get('/list-users','CustomerController@list_cus'); // show trong admin

route::get('delete-cus/{id}',[CustomerController::class,'delete_cus']);

route::get('/list-users-block',[CustomerController::class,'list_cus_block']);


//SEND MAIL
route::get('/send-mail',[MailController::class,'send_mail']);

