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

// Auth::routes();
// Route::get('/home', 'HomeController@index');
// Route::get('/mail', 'MailController@mail');

Route::get('/', 'StaticPagesController@home')->name('home');            // 首页
Route::get('/help', 'StaticPagesController@help')->name('help');        // 帮助页
Route::get('/about', 'StaticPagesController@about')->name('about');     // 关于页
Route::get('/signup', 'UsersController@create')->name('signup');        // 注册
Route::resource('/users', 'UsersController');                            // 用户
Route::get('/login', 'SessionsController@create')->name('login');        // 登录
Route::post('/login', 'SessionsController@store')->name('login');        // 登录操作
Route::delete('/logout', 'SessionsController@destroy')->name('logout');  // 注销
Route::get('/signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');                    // 激活链接
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');    // 密码重置页面
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');      // 发送重设链接
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');     // 密码更新页面
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');                   // 执行密码更新操作
Route::resource('/statuses', 'StatusesController', ['only' => ['store', 'destroy']]);                            // 微博
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');                  // 显示用户的关注人列表
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');                     // 显示用户的粉丝列表
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');                    // 关注用户
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');              // 取消关注用户
