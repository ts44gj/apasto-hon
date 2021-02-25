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
    'only' => ['create', 'store','destroy','edit','update']
  ]);
});

Route::group(['middleware'=>['auth:user'],], function(){

  Route::resource('likes', 'LikeController', [
      'only' => ['store', 'destroy']
  ]);
});

Route::get("posts/{post}/favorites","FavoriteController@store");

Route::get("posts/{post}/unfavorites","FavoriteController@destroy");

//userでall_timelineを表示
Route::get('post/user/timeline/','LinkController@showTimeline')->name('Timeline');

//userでお店毎のtimelineを表示
Route::get('post/user/show_timeline/{admin_id}','LinkController@show')->name('show');

//adminでall_timelineを表示
Route::get('post/admin/timeline/','PostController@admin_showTimeline')->name('admin_Timeline');

//adminでお店毎のtimelineを表示
Route::get('/post/admin/show_timeline/{admin_id}','PostController@admin_show')->name('admin_show');



