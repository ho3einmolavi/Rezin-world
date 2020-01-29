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

use Illuminate\Support\Facades\Route;



Route::get('/', 'MainController@index');
Route::get('/article/{title}', 'MainController@article')->name('article');


Route::get('/products/category/{any}' , 'MainController@mainCat')->name('main');
Route::get('/products/category/{any}/second/{any1}' , 'MainController@mainCat')->name('second')->where(['any' => '.*' , 'any1' => '.*']);
Route::get('/products/search/{any}' , 'MainController@mainCat')->name('search')->where('any' , '.*');

//})->where('any', '.*');


Route::get('/single/{any}' , function () {
    return view('single');
})->where('any', '.*');


Route::get('/card/{any}' , function () {
    return view('card');
})->where('any', '.*');

Route::get('/404' , function () {
    return view('404');
});

Route::get('/faq' , function () {
    return view('products');
});

Route::get('/about-us' , function () {
    return view('products');
});

Route::get('/contact-us' , function () {
    return view('products');
});

//Route::get('/order/pay/error' , function () {
//    return view('products');
//});
//
//Route::get('/{any}/order/pay' , function () {
//    return view('products');
//})->where('any', '.*');

Route::get('/admin/{any}' , function () {
    return view('admin');
})->where('any', '.*');

Route::get('/user/{any}' , function () {
    return view('admin');
})->where('any', '.*');

Route::get('/details/{any}' , function () {
    return view('admin');
})->where('any', '.*');

Route::get('/adminOrdersDetails/{any}' , function () {
    return view('admin');
})->where('any', '.*');

Route::get('/product/{any}' , function () {
    return view('admin');
})->where('any', '.*');

Route::get('/payment-success' , function () {
    return view('payment');
})->name('pay.success');


