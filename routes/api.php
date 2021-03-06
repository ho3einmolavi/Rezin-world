<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$middleware = ['api'];
if (\request()->header('Authorization'))
    $middleware = array_merge(['auth:api']);

// categories
Route::get('/mainCat' , 'CategoryController@main');
Route::get('/indexCat' , 'CategoryController@index');
Route::post('/create/cat' , 'CategoryController@create');
Route::get('/{id}/all' , 'CategoryController@all');
Route::get('/all/third' , 'CategoryController@all_third');
Route::get('/menu' , 'CategoryController@menu');

//brands
Route::post('/create/brand' , 'BrandController@store');
Route::get('/{id}/findBrands' , 'BrandController@findBrands');
Route::get('/brands' , 'BrandController@index');

//discounts
Route::post('/create/discount' , 'DiscountController@create');
Route::get('/index/discount' , 'DiscountController@index');
Route::get('/check/discounts' , 'DiscountController@check');
Route::post('/create/special_discount' , 'SpecialDiscountController@create');
Route::post('/use/special_discount' , 'SpecialDiscountController@use');
Route::get('/index/special_discount' , 'SpecialDiscountController@index');
Route::post('/use/discount' , 'DiscountController@use')->middleware('auth:api');

//settings
Route::post('/setting' , 'SettingController@update');
Route::get('/setting/index' , 'SettingController@index');
Route::post('/logo' , 'SettingController@logo');


//passport
Route::post('/register' , 'AuthController@register');
Route::post('/login' , 'AuthController@login');
Route::post('/registerAdmin' , 'AuthController@registerAdmin');
Route::post('/loginAdmin' , 'AuthController@loginAdmin');
Route::get('/check/admin' , function (){
    return auth()->user();
})->middleware(['auth:api', 'scope:admin']);



//users
Route::get('/users' , 'UserController@index');
Route::post('/sendMessage' , 'UserController@sendMessage')->middleware('auth:api');
Route::post('/forgetPassword' , 'UserController@forgetPassword');
Route::post('/forgetPassword/verify' , 'UserController@forgetPassword_verify');
Route::post('/getcode' , 'UserController@getCode');
Route::post('/verification' , 'UserController@verificationTheCode');
Route::post('/{id}/deleteUser' , 'UserController@deleteUser');
Route::post('/edit' , 'UserController@edit')->middleware('auth:api');
Route::post('/orders' , 'UserController@orders')->middleware('auth:api');
Route::post('/changePassword' , 'UserController@changePassword')->middleware('auth:api');
Route::get('/user' ,function (){
    return auth()->user();
})->middleware('auth:api');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//products
Route::post('/search/{param}' , 'ProductController@search');
Route::get('/product/{id}' , 'ProductController@show');
Route::get('/index' , 'ProductController@index');
Route::get('/sameProducts/{id}' , 'ProductController@sameProducts');
Route::post('/product/edit/{id}' , 'ProductController@edit')->middleware(['auth:api', 'scope:admin']);
Route::post('/store' , 'ProductController@store')->middleware(['auth:api', 'scope:admin']);
Route::get('/mostSale' , 'ProductController@mostSale');
Route::get('/latest_products/{number}' , 'ProductController@latest_products');
Route::get('/addtoslideshow/{id}' , 'ProductController@addToSlideShow')->middleware(['auth:api', 'scope:admin']);
Route::get('/slideShow' , 'ProductController@getSlideShow');
Route::post('/filters/brands' , 'ProductController@filterByBrands');
Route::get('/filters/category/{id}/{param}' , 'ProductController@filterByCategory');
Route::get('/filters/category/{main}/{sec}/{param}' , 'ProductController@productsBySecondCat');


//search
Route::post('/search/{table}/{param}' , 'searchController@search');
Route::get('/{table}/{id}/delete' , 'searchController@deleteEverything');

//orders
Route::post('/order/create' , 'OrderController@create')->middleware(['auth:api']);
Route::get('/orders' , 'OrderController@index');
Route::get('/check/order/{id}' , 'OrderController@show')->middleware('auth:api');
Route::get('/user/orders' , 'OrderController@userOrders')->middleware(['auth:api']);
Route::get('/verify/order/{id}' , 'OrderController@verify')->middleware(['auth:api', 'scope:admin']);


//comments
Route::post('/store/comment' , 'CommentController@store')->middleware($middleware);
Route::get('/comments/{product_id}' , 'CommentController@index');
Route::get('/comment/verify/{id}' , 'CommentController@verify')->middleware(['auth:api', 'scope:admin']);
Route::get('/allComments' , 'CommentController@allComments');
Route::get('/comments_in_index' , 'CommentController@comments_in_index');


//baners
Route::get('/baners' , 'BanerController@index');
Route::post('/update/baner/{id}' , 'BanerController@update');
Route::get('/productsPage/baner' , 'BanerController@showProductsPageBaner');


//zarinpal
Route::post('/zarinpal/request' , 'InvoiceController@zarinPal_request');


//articles
Route::post('/article/store' , 'ArticleController@store')->middleware(['auth:api', 'scope:admin']);
Route::get('/articles' , 'ArticleController@index');
Route::get('/articlesForShow' , 'ArticleController@show');
Route::post('/article/{id}' , 'ArticleController@update')->middleware(['auth:api', 'scope:admin']);