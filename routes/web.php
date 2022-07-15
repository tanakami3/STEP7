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

// ①ルーティング作成(登録画面表示・ブログ登録)
// ②コントローラー作成(登録画面表示)
// ③登録画面のBladeを表示(CSRF対策)
// ④コントローラ作成(ブログ登録)
// ⑤バリデーション作成
// ⑥エラー処理


//商品一覧画面　表示
Route::get('/', 'ProductController@showList')->name('products');

//商品登録画面　表示
Route::get('/product/create', 'ProductController@showCreate')->name('create');

//商品登録
Route::post('/product/store', 'ProductController@exeStore')->name('store');

//商品詳細画面　表示
Route::get('/product/{id}', 'ProductController@showDetail')->name('detail');

//商品削除画面　表示
Route::post('/product/delete/{id}', 'ProductController@exeDelete')->name('delete');

//商品編集画面　表示
Route::get('/product/edit/{id}', 'ProductController@showEdit')->name('edit');

//商品情報更新
Route::post('/product/update', 'ProductController@exeUpdate')->name('update');

// 画像投稿ページを表示
Route::get('/create3', 'UploadController@postimg');

// 画像投稿をコントローラーに送信
Route::post('/newimgsend', 'UploadController@saveimg');

//検索機能
Route::get('/searchDisplay','ProductController@searchDisplay')->name('searchDisplay');
Route::get('/search','ProductController@search')->name('search');


//ユーザー登録　画面表示
Route::get('/user/signup', 'UserController@getSignup')->name('signup');

//ログイン　
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');












