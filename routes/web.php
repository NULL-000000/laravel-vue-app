<?php

//認証系のルーティングを追加
Auth::routes();

//ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

//フッターのルーティングを追加
// Route::get('/', 'HomeController@home')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');

//入力ページ
Route::get('/contact', 'ContactController@index')->name('contact.index');
//確認ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');
//送信完了ページ
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');

//SNSアカウントログイン用
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});
//SNSアカウントログイン時のユーザー登録
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});

//topページ
Route::get('/', 'ArticleController@index')->name('articles.index');

//indexのルーティングを削除
//authミドルウェアでログイン済かチェック
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);

//いいね機能
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

//達成チェック
Route::get('/achievements/{article}/edit', 'AchievementController@edit')->name('achievement.edit')->middleware('auth');
Route::patch('/achievements/{article}/update', 'AchievementController@update')->name('achievement.update')->middleware('auth');

//コメント投稿処理
Route::post('/comments','CommentsController@store')->name('comments.store');

//コメント取消処理
Route::get('/comments/{comment_id}', 'CommentsController@destroy');

//タグ機能
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

//ユーザーページ表示
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    //プロフィール編集画面
    Route::get('/{name}/edit', 'UserController@edit')->name('edit')->middleware('auth');
    //プロフィール編集処理
    Route::patch('/{name}/update', 'UserController@update')->name('update')->middleware('auth');
    //メールアドレス編集画面
    Route::get('/{name}/email/edit', 'UserController@editEmail')->name('email.edit')->middleware('auth');
    //メールアドレス編集処理
    Route::post('/{name}/email/update', 'UserController@updateEmail')->name('email.update')->middleware('auth');
    //パスワード設定画面
    Route::get('/{name}/password/create', 'UserController@createPassword')->name('password.create')->middleware('auth');
    //パスワード設定処理
    Route::post('/{name}/password/store', 'UserController@storePassword')->name('password.store')->middleware('auth');
    //パスワード編集画面
    Route::get('/{name}/password/edit', 'UserController@editPassword')->name('password.edit')->middleware('auth');
    //パスワード編集処理
    Route::patch('/{name}/password/update', 'UserController@updatePassword')->name('password.update')->middleware('auth');
    //ユーザーアカウント退会画面表示
    Route::get('/{name}/resign', 'UserController@resign')->name('resign')->middleware('auth');
    //ユーザーアカウント退会処理
    Route::post('/{name}/delete_data', 'UserController@deleteData')->name('delete_data')->middleware('auth');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
});

//並び替え
Route::get('/{sort_type}', 'ArticleController@sort')->name('articles.sort');

if (app()->environment('production')) {
    URL::forceScheme('https');
}
