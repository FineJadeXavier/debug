<?php
use Illuminate\Support\Facades\Route;

//编辑器图片默认会上传到 public/uploads/content 目录下；编辑器相关功能配置位于 config/wang-editor.php 文件中。
//在 blade 模版里面使用下面三个方法：we_css() 、we_js() 、we_field() 和 we_config() 。
//
//请注意 we_field() 与 we_config() 第一个参数（对应下面示例中的 wangeditor ) 必须保持一致。
//


//首页
Route::get('/', function () { return view('index.index');});

//登录
Route::get('/signin', function () {return view('user.signin');})->name('user.signin');
Route::post('/signin', 'UserController@signin')->name('user.signin.p');

//注册
Route::get('/signup', function () {return view('user.signup');})->name('user.signup');
Route::post('/signup', 'UserController@signup')->name('user.signup.p');

Route::get('/article/new',function () {return view('article.write');} )->name('article.new');


//登录中间件
Route::middleware('signin')->group(function(){

    //编辑个人资料
    Route::get('/user/edit/', 'UserController@edit')->name('user.edit');

    //写文章


});