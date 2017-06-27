<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("/admin/index/index", "Admin\IndexController@index");



/* 用户控制器 */
Route::get("/admin/user/index", "Admin\UserController@index");
Route::post("/admin/user/index", "Admin\UserController@index");

// 用户的添加提交s
Route::post("/admin/index/add", "Admin\UserController@add");
// 用户的添加页面
Route::get("/admin/user/insert", "Admin\UserController@insert");

// 用户编辑页面
Route::get("/admin/user/edit/{id}", "Admin\UserController@edit");
Route::get("/admin/user/delete/{id}", "Admin\UserController@delete");
Route::post("/admin/user/update", "Admin\UserController@update");

Route::post("admin/user/ajax", "Admin\UserController@ajax");

// Route::get("/admin/index/insert", "");

/* 分类控制器*/
Route::get("admin/cate/index", "Admin\CateController@index");
Route::get("admin/cate/edit", "Admin\CateController@edit");
Route::get("admin/cate/add", "Admin\CateController@add");
Route::post("admin/cate/insert", "Admin\CateController@insert");
Route::post("admin/user/ajaxUpdate", "Admin\UserController@ajaxUpdate");

/* 商品管理模块 */
Route::get("/admin/goods/index", "Admin\GoodsController@index");
Route::get("/admin/goods/add", "Admin\GoodsController@add");
Route::post("/admin/goods/insert", "Admin\GoodsController@insert");
// Route::get("/admin/goods/index", "Admin\GoodsController@index");