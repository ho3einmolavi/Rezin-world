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



//users
Route::get('/users' , 'UserController@index');
Route::post('/sendMessage' , 'UserController@sendMessage');
Route::post('/forgetPassword' , 'UserController@forgetPassword');
Route::post('/forgetPassword/verify' , 'UserController@forgetPassword_verify');
//Route::post('/login' , 'UserController@login');
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
Route::post('/product/edit/{id}' , 'ProductController@edit');
Route::post('/store' , 'ProductController@store');
Route::get('/mostSale' , 'ProductController@mostSale');
Route::get('/addtoslideshow/{id}' , 'ProductController@addToSlideShow');
Route::get('/slideShow' , 'ProductController@getSlideShow');
Route::post('/filters/brands' , 'ProductController@filterByBrands');
Route::get('/filters/category/{id}/{param}' , 'ProductController@filterByCategory');
Route::get('/filters/category/{main}/{sec}/{param}' , 'ProductController@productsBySecondCat');


//search
Route::post('/search/{table}/{param}' , 'searchController@search');
Route::get('/{table}/{id}/delete' , 'searchController@deleteEverything');

//orders
Route::post('/order/create' , 'OrderController@create')->middleware('auth:api');
Route::get('/orders' , 'OrderController@index');
Route::get('/check/order/{id}' , 'OrderController@show')->middleware('auth:api');
Route::get('/user/orders' , 'OrderController@userOrders')->middleware('auth:api');
Route::post('/find/products/order' , 'OrderController@find');
Route::get('/verify/order/{id}' , 'OrderController@verify');


//comments
Route::post('/store/comment' , 'CommentController@store')->middleware($middleware);
Route::get('/comments/{product_id}' , 'CommentController@index');
Route::get('/comment/verify/{id}' , 'CommentController@verify');
Route::get('/allComments' , 'CommentController@allComments');


//baners
Route::get('/baners' , 'BanerController@index');
Route::post('/update/baner/{id}' , 'BanerController@update');
Route::get('/productsPage/baner' , 'BanerController@showProductsPageBaner');


////for android app
//Route::post('/register' , 'UserController@registerForApp');
//Route::post('/app/verifyCode' , 'UserController@verificationTheCodeForApp');
//Route::post('/app/getcode' , 'UserController@getCodeForApp');
//Route::get('/newProducts' , 'ProductController@newProductsForApp');
//Route::get('/mostDiscounted' , 'ProductController@mostDiscountedForApp');
//Route::post('/price/filter' , 'ProductController@productsByPriceForApp');
//Route::post('/app/filters/category/{main}/{third}/third' , 'ProductController@productsByThirdCatForApp');
//Route::post('/app/search' , 'ProductController@searchForApp');


//articles
Route::post('/article/store' , 'ArticleController@store');
Route::get('/articles' , 'ArticleController@index');
Route::get('/articlesForShow' , 'ArticleController@show');