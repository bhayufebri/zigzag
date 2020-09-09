<?php

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
    //     // return view('welcome');
        return view('auth.login');
    //     return view('main.index');
    
    })
    // ->middleware('guest')
    ;
    // Route::post('v2/midtrans/notification', 'CustomerController@midtransNotification');
    
    // Route::get('/','MainController@index')->name('main.index');
    // Route::get('/','MainController@index')->name('auth.login');

    Route::get('/checkout','MainController@checkout')->name('main.checkout');
    Route::get('/mainlogin','MainController@mainlogin')->name('main.mainlogin');
Route::get('/mainregister','MainController@mainregister')->name('main.mainregister');
Route::post('/mainregisterstore','MainController@mainregisterstore')->name('main.mainregisterstore');
Route::get('/main/{id}','MainController@show')->name('main.show');
Route::post('/contain_req','MainController@contain_req')->name('main.contain_req');
Route::post('/filter_req','MainController@filter_req')->name('main.filter_req');
Route::post('/index_from_top','MainController@index_from_top')->name('main.index_from_top');
Route::post('/like','MainController@like')->name('main.like');


Route::get('/main/show_detail/{id}','MainController@show_detail')->name('main.show_detail');







Route::get('/customer/index', 'CustomerController@index')->name('customer.index');
Route::get('/customer/list', 'CustomerController@list')->name('customer.list');
Route::get('/customer/indexData','CustomerController@indexData')->name('customer.indexData');
Route::get('/customer/show/{id}','CustomerController@show')->name('customer.show');
Route::post('/customer/pay','CustomerController@pay')->name('customer.pay');
Route::get('/customer/order/{id}','CustomerController@order')->name('customer.order');
Route::get('/customer/show_detail/{id}','CustomerController@show_detail')->name('customer.show_detail');
Route::get('/customer/cetak_pdf/{id}','CustomerController@cetak_pdf')->name('customer.cetak_pdf');
Route::get('/customer/user','CustomerController@user')->name('customer.user');
Route::post('/customer/update_user','CustomerController@update_user')->name('customer.update_user');












Route::get('401', function () {
    return view('errors.401');
});
//------------------------------------------------------------------//
//------tambahan start-----//
Route::get('/admin', 'MainController@index')->name('login_page');
//------tambahan end----//

Route::get('/login', 'MainController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//------------------------------------------------------------------//
Route::get('/home', 'HomeController@index')->name('home')->middleware('cekauth');
//------------------------------------------------------------------//

Route::group(['middleware' => ['auth','cekauth']], function(){
        // Route::get('/user','UserController@index')->name('user.index');
        // Route::get('/user/create','UserController@create')->name('user.create');
        // Route::post('/user/store','UserController@store')->name('user.store');

        Route::get('/user/indexData','UserController@indexData')->name('user.indexData');
        Route::post('user/lihat', 'UserController@lihat')->name('user.lihat');
        Route::post('user/delete', 'UserController@delete')->name('user.delete');
        Route::get('user/cetak_pdf/{id}', 'UserController@cetak_pdf')->name('user.cetak_pdf');


        Route::resource('user', 'UserController');
        // Route::put('/user/update/{id}','UserController@update')->name('user.update');
        // Route::get('/user/detail/{id}','UserController@detail')->name('user.detail');
        // Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
        // Route::post('/user/export','UserController@export')->name('user.export');

        Route::get('/event','EventController@index')->name('event.index');
        Route::get('/event/indexData','EventController@indexData')->name('event.indexData');
        Route::get('/event/detail/{id}','EventController@detail')->name('event.detail');
        Route::get('/event/edit/{id}','EventController@edit')->name('event.edit');
        Route::put('/event/status/update','EventController@status_update')->name('event.status_update');
        Route::put('/event/update_first/{id}','EventController@update_first')->name('event.update_first');
        Route::post('/event/date_edit','EventController@date_edit')->name('event.date_edit');
        Route::post('/event/date_add/{id}','EventController@date_add')->name('event.date_add');
        Route::post('/event/date_add_modal','EventController@date_add_modal')->name('event.date_add_modal');

        Route::get('/event/set_featured/{id}','EventController@set_featured')->name('event.set_featured');


        Route::put('/event/date_update','EventController@date_update')->name('event.date_update');
        Route::get('/event/date_delete/{id}/{event}','EventController@date_delete')->name('event.date_delete');
        Route::put('/event/schedule_update/{id}','EventController@schedule_update')->name('event.schedule_update');
        Route::post('/event/tikcket_add/{id}','EventController@tikcket_add')->name('event.tikcket_add');
        Route::post('/event/ticket_delete','EventController@ticket_delete')->name('event.ticket_delete');
        Route::post('/event/schedule_add/{id}','EventController@schedule_add')->name('event.schedule_add');
        Route::get('/event/schedule_delete/{id}/{event}','EventController@schedule_delete')->name('event.schedule_delete');
        Route::post('/event/last_update/{id}','EventController@last_update')->name('event.last_update');

        Route::get('/order/indexData','OrderController@indexData')->name('order.indexData');
        Route::get('/order/cetak_pdf/{id}','OrderController@cetak_pdf')->name('order.cetak_pdf');
        Route::post('/order/export_order','OrderController@export_order')->name('order.export_order');


        Route::get('/category_product/index','CategoryProductController@index')->name('category_product.index');
        Route::get('/category_product/indexData','CategoryProductController@indexData')->name('category_product.indexData');
        Route::post('/category_product/create','CategoryProductController@create')->name('category_product.create');
        Route::post('/category_product/edit_category','CategoryProductController@edit_category')->name('category_product.edit_category');
        Route::post('/category_product/update_category','CategoryProductController@update_category')->name('category_product.update_category');
        Route::post('/category_product/delete_category','CategoryProductController@delete_category')->name('category_product.delete_category');

        Route::get('/product/index','ProductController@index')->name('product.index');
        Route::get('/product/indexData','ProductController@indexData')->name('product.indexData');
        Route::post('/product/store','ProductController@store')->name('product.store');
        Route::post('/product/edit','ProductController@edit')->name('product.edit');
        Route::post('/product/update','ProductController@update')->name('product.update');
        Route::post('/product/delete','ProductController@delete')->name('product.delete');
        Route::get('/product/show/{id}','ProductController@show')->name('product.show');

        Route::post('/product/stock_store','ProductController@stock_store')->name('product.stock_store');
        Route::post('/product/stock_edit','ProductController@stock_edit')->name('product.stock_edit');
        Route::post('/product/stock_update','ProductController@stock_update')->name('product.stock_update');
        Route::post('/product/stock_delete','ProductController@stock_delete')->name('product.stock_delete');
        Route::post('/product/stock_success','ProductController@stock_success')->name('product.stock_success');
        Route::post('/product/stock_hadir','ProductController@stock_hadir')->name('product.stock_hadir');
        Route::post('/product/stock_kirim','ProductController@stock_kirim')->name('product.stock_kirim');
        Route::post('/product/histori','ProductController@histori')->name('product.histori');















        Route::resource('order', 'OrderController');













        Route::get('/event/event_post','EventController@event_post')->name('event.event_post');
        Route::get('/event/event_post_when_where','EventController@event_post_when_where')->name('event.event_post_when_where');
        Route::get('/event/event_post_ticket','EventController@event_post_ticket')->name('event.event_post_ticket');
        Route::get('/event/event_post_custom','EventController@event_post_custom')->name('event.event_post_custom');

        Route::get('/event/post','EventController@post')->name('event.post');
        Route::post('/event/store','EventController@store')->name('event.store');
        Route::get('/event/event_class/{id}','EventController@event_class')->name('event.event_class');
        Route::post('/event/class_store','EventController@class_store')->name('event.class_store');
        Route::post('/event/export_event','EventController@export_event')->name('event.export_event');





        // Page
        Route::resource('dashboard/pages', 'PagesController', ['as' => 'dashboard']);
        Route::get('/pages', 'PagesController@index')->name('pages.index');
        Route::get('/pages/create', 'PagesController@create')->name('pages.create');
        Route::get('/pages/edit/{id}','PagesController@edit')->name('pages.edit');
        Route::post('/pages/update/{id}', 'PagesController@update')->name('pages.update');
        Route::get('/pages/detail/{id}', 'PagesController@detail')->name('pages.detail');
        Route::delete('/pages/delete/{id}','PagesController@destroy')->name('pages.delete');

        //Article
        Route::get('/articles', 'ArticlesController@index')->name('articles.index');
        Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
        Route::post('/articles', 'ArticlesController@store')->name('articles.store');
        Route::get('/articles/indexData', 'ArticlesController@indexData')->name('articles.indexData');
        Route::get('/articles/edit/{id}','ArticlesController@edit')->name('articles.edit');
        Route::post('/articles/{id}', 'ArticlesController@update')->name('articles.update');
        Route::get('/articles/detail/{id}', 'ArticlesController@detail')->name('articles.detail');
        Route::delete('/articles/delete/{id}','ArticlesController@destroy')->name('articles.delete');


        //Category
        Route::get('/categories', 'CategoriesController@index')->name('categories.index');
        Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
        Route::post('/categories', 'CategoriesController@store')->name('categories.store');
        Route::get('/categories/indexData', 'CategoriesController@indexData')->name('categories.indexData');
        Route::get('/categories/edit/{id}','CategoriesController@edit')->name('categories.edit');
        Route::patch('/categories/{id}', 'CategoriesController@update')->name('categories.update');
        Route::delete('/categories/delete/{id}','CategoriesController@destroy')->name('categories.delete');

        //Legals
        Route::get('/document', 'DocumentController@index')->name('document.index');
        Route::get('/document/indexData', 'DocumentController@indexData')->name('document.indexData');
        Route::get('/document/detail/{id}', 'DocumentController@detail')->name('document.detail');
        Route::post('/document/updatestatus_legal/{id}','DocumentController@setVerified')->name('document.setVerified');
        Route::delete('/document/delete/{id}','DocumentController@destroy')->name('document.delete');

 });