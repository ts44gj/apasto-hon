<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });

});
Route::group(['middleware'=>['auth:admin'],], function(){

Route::resource('posts', 'PostController', [
      'only' => ['create', 'store']
  ]);
  //Route::resource('/{$id}','PostController',[
        //'only' => ['show']
    //]);
});

//保存した画像を表示するページ
Route::get('/output', 'PostController@output');
//userでtimelineを表示
Route::get('post/user/timeline/','LinkController@showTimeline')->name('showTimeline');

//Route::resource('post/admin/show_timeline/','linkController',[
  //    'only' => ['show']
 // ]);
 Route::get('post/admin/show_timeline/{admin_id}','LinkController@show')->name('show');


//adminでtimelineを表示
Route::get('/post/admin/timeline/','PostController@showTimeline')->name('showTimeline');


//userでadminのtimelineを表示
//Route::get('post/admin/show_timeline/{$admin_id}','linkController@show',)->name('show');


Route::get('post/user/create', 'UserPostController@user_create');

Route::post('post/user/create', 'UserPostController@user_store')->name('user_create');

