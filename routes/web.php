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
//路由寫法，第一個參數為網址輸入的值，目前是直接透過路由顯示view
Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    return view('test');
});
//以下是使用home.blade.php的寫法
/*Route::get('home', function () {
    return View::make('home')
    	->with('title', '首頁')	//第一個為php的參數，第二個為值，用with連接
        ->with('hello', '大家好～～');
});*/
//路由將指向相對應的控制器，第一個參數為輸入的值，第二個為控制器@function名
Route::get('home', 'Home@index');
//同上，但加上了傳遞GET參數
Route::get('home/{id}', 'Home@show');
//blog，get一般用途；post新增；put更新；delete刪除
Route::group(['prefix'=>'post'], function() {
    Route::get('/', 'Blog@index');
	Route::post('/', 'Blog@insert');
    Route::post('post_ajax', 'Blog@insertAjax');
	Route::get('{id}', 'Blog@view');
	Route::get('{id}/edit', 'Blog@edit');
	Route::put('{id}', 'Blog@update');
	Route::get('delete/{id}', 'Blog@delete');
});
//登入
Route::get('login', 'Login@show');
Route::post('login', 'Login@login');
Route::get('logout', 'Login@logout');
//line notify
Route::get('line_notify', 'blog@lineNotify');
//sqlsrv test
Route::get('sqlsrv', 'blog@sqlsrv');

/*
 * Eloquent 測試用
 */
Route::group(['prefix' => 'test'], function() {
    Route::get('', 'EloquentTest@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('soap/text', 'soapController@show');

//檔案上傳與圖片顯示(使用laravel檔案上傳功能)
Route::get('/upload_file', 'uploadFileController@index');
Route::post('/upload_file', 'uploadFileController@stroeData');

//guzzlehttpphp artisan vendor:publish --provider="Scriptotek\GoogleBooks\GoogleBooksServiceProvider"
Route::get('/guzzle', 'guzzleController@index');

//測試資料表名稱用變數帶入
Route::get('/table_val', 'tableValController@index');

//測試使用google books api
Route::get('google_books', 'googleBooksController@index');
