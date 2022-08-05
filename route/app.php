<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('hello/:name', 'index/hello');
Route::get('/', 'home/index');
Route::get('feed.xml', 'home/feed');
Route::get('feed', 'home/feed');
Route::get('blog/:category/:blogId', 'home/blog');
Route::get('page/:pageNo', 'home/page');
Route::get('category/:categoryId/page/:pageNo', 'home/category');
Route::get('category/:categoryId', 'home/category');
Route::get('tags/:tagId/page/:pageNo', 'home/tags');
Route::get('tags/:tagId', 'home/tags');
Route::get('archive/:yearMonthId/page/:pageNo', 'home/archive');
Route::get('archive/:yearMonthId', 'home/archive');
Route::get("search", "home/search");
Route::any("export", 'home/exportSite');
Route::get("wp2gb", 'home/wp2Gb');
Route::miss('home/go404');