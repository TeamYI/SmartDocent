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
//초기진입시 로그인 페이지로 감
//Route::get('/','PageController@login');
/*Route::get('/main','PageController@main');*/
//아이디, 비밀번호 검사
Route::post('/login', 'ModelController@login');
Route::get('/member_manage','PageController@member_manage');
Route::get('/cultural_manage','PageController@cultural_manage');
Route::get('/member_get','MemberController@member_get');
Route::post('/member_serch','MemberController@member_serch');
Route::post('/page_update','PageController@member_update');
Route::post('/member_delete','MemberController@member_delete');

Route::get("/",function(){
    return view("main");
});

Route::post('upload','UploadController@upload') ;
Route::get('culturalManage','UploadController@CulturalManageGet')->name('upload.cultureManager');

//controller 추가부문
Route::resource('culture_register','CultureRegisterController');