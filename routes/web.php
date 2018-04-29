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
//Route::get('/cultural_manage','PageController@cultural_manage');
Route::get('/member_get','MemberController@member_get');
Route::post('/member_serch','MemberController@member_serch');
Route::post('/page_update','PageController@member_update');
Route::post('/member_delete','MemberController@member_delete');
Route::post('/guide_point_add','CulturalController@guide_point_add');

Route::get("/",function(){
    return view("main");
});
// 문화재 등록
Route::post('upload','UploadController@upload') ;
Route::get('culturalManage','UploadController@CulturalManageGet')->name('upload.cultureManager');
Route::post('oneTypeCulturalShow', 'UploadController@oneTypeCulturalShow') ;
Route::post('twoTypeCulturalShow', 'UploadController@twoTypeCulturalShow') ;


//Element
Route::post('add_element','ElementController@add_element');
Route::post('update_element','ElementController@update_element');
Route::post('del_element', 'ElementController@del_element');


//element 등록
Route::post("culturalExplanation","ElementDetailController@culturalExplanation");
Route::post("explainDelete","ElementDetailController@explainDelete");
Route::post("explaintionPriority","ElementDetailController@explaintionPriority");
Route::post("culturalElementAllSelect","ElementDetailController@culturalElementAllSelect");

//file
Route::post("audioRegister","AudioDataFileController@audioRegister");
Route::post("audioSelect","AudioDataFileController@audioSelect");
Route::post("audioAjaxUpload","AudioDataFileController@audioAjaxUpload");

//controller 추가부문
Route::resource('culture_register','CultureRegisterController');

//문화재 리스트
Route::get('manage_list', 'PageController@manage_list');