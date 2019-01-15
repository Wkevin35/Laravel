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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::group(['prefix'=>'user'],function(){
	//使用者驗證
	Route::group(['prefix'=>'auth'],function(){
		//使用者登入
		Route::get('/sign-in','user\auth\UserAuthController@signInPage');
		//使用者登入處理
		Route::post('/sign-in','user\auth\UserAuthController@signInProcess');
		//使用者登出
		Route::get('/sign-out','user\auth\UserAuthController@signOut');
		//使用者註冊
		Route::get('/sign-up','user\auth\UserAuthController@signUpPage');

		//使用者資料新增
		Route::post('/sign-up','user\auth\UserAuthController@signupProcess');
	});
});