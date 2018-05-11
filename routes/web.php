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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::post('/auth', 'LoginController@auth')->name('auth');
});
//用户
Route::resource('users', 'UsersController');
//教练
Route::resource('trainers', 'TrainersController');
//分馆
Route::resource('branches', 'BranchesController');
//班级
Route::resource('grades', 'GradesController');
//课程
Route::resource('courses', 'CoursesController');
//课件
Route::resource('teachings', 'TeachingsController');
//资讯
Route::resource('news', 'NewsController');
//附件上传
Route::post('/attachment/upload', 'AttachmentController@upload')->name('attachment.upload');
Route::get('/attachment/demo', 'AttachmentController@demo')->name('attachment.demo');
//短信
Route::post('/sms/send', 'SmsController@send')->name('sms.send');
