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

// Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('/', 'merchandise\MerchandiseController@merchandiseListPage');

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

Route::group(['prefix'=>'merchandise'],function(){
	//商品清單檢視
	Route::get('/', 'merchandise\MerchandiseController@merchandiseListPage');
	//商品資料新增
	Route::get('/create','merchandise\MerchandiseController@merchandiseCreateProcess')->middleware(['user.auth.admin']);
	//商品管理清單檢視
	Route::get('/manage', 'merchandise\MerchandiseController@merchandiseManageListPage')->middleware(['user.auth.admin']);

	//指定商品
	Route::group(['prefix'=>'{merchandise_id}'],function(){
		//商品單品檢視
		Route::get('/', 'merchandise\MerchandiseController@merchandiseItemPage');

		//購買商品
		Route::post('/buy','merchandise\MerchandiseController@merchandiseItemBuyProcess')->middleware(['user.auth']);

		Route::group(['middleware'=>['user.auth.admin']],function(){
			//商品單品編輯頁面檢視
			Route::get('/edit', 'merchandise\MerchandiseController@merchandiseItemEditPage');

			//商品單品資料修改
			Route::put('/', 'merchandise\MerchandiseController@merchandiseItemUpdateProcess');
		});
		
	});
});