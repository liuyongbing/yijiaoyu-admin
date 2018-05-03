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
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('loginPost');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});
//用户
Route::resource('users', 'UsersController');
//指导员
Route::resource('trainers', 'TrainersController');
//班级
Route::resource('grades', 'GradesController');
//课程
Route::resource('courses', 'CoursesController');
//课时
Route::resource('teachings', 'TeachingsController');
//附件上传
Route::post('/attachment/upload', 'AttachmentController@upload')->name('attachment.upload');
Route::get('/attachment/demo', 'AttachmentController@demo')->name('attachment.demo');
