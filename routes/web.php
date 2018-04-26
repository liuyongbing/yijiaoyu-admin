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

//学员资料
Route::resource('students', 'StudentController');
//用户
Route::resource('users', 'UsersController');
//班级
Route::resource('grades', 'GradesController');
//课程
Route::resource('courses', 'CoursesController');
//课程
Route::resource('teachings', 'TeachingsController');
