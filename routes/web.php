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

Route::get('/','PageController@login');
/*Route::get('/main','PageController@main');*/
Route::post('/login', 'ModelController@login');
Route::get('/member_manage','PageController@member_manage');
Route::get('/cultural_manage','PageController@cultural_manage');
