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
    Route::post('/login', 'LoginController@auth')->name('auth');
});
//Account(账号管理)
Route::resource('accounts', 'AccountsController');
//Apply(加盟申请)
Route::resource('apply', 'ApplyController');
//Attachment(附件上传)
Route::post('/attachment/upload', 'AttachmentController@upload')->name('attachment.upload');
Route::get('/attachment/demo', 'AttachmentController@demo')->name('attachment.demo');
//Banner:头图
Route::resource('banner', 'BannerController');
//Branch(分馆)
Route::resource('branches', 'BranchesController');
//Category(分类)
Route::resource('categories', 'CategoryController');
//Course(课程)
Route::resource('courses', 'CoursesController');
//Grade(班级)
Route::resource('grades', 'GradesController');
//Members(团队成员)
Route::resource('members', 'MembersController');
//News(资讯)
Route::resource('news', 'NewsController');
//Sections(网页版块)
Route::resource('sections', 'SectionController');
//SMS(短信)
Route::post('/sms/send', 'SmsController@send')->name('sms.send');
//Teaching(课件)
Route::resource('teachings', 'TeachingsController');
//Trainer(教练)
Route::resource('trainers', 'TrainersController');
//User(用户)
Route::resource('users', 'UsersController');