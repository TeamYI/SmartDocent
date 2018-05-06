<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ElementDetail;
use \Input as Input;

class ElementDetailController extends Controller
{
    private $ElementDetail;
    public function __construct()
    {
        $this->ElementDetail = new ElementDetail() ;
    }
    public function culturalExplanation(Request $request){
//        cultural_code : cultural_code ,
//        priority : i ,
//            latitude : explantion[i][0],
//            longitude : explantion[i][1],
//            element_code : 5

        $cultural_code = $request->get("cultural_code");
        $priority = $request->get("priority");
        $latitude = $request->get("latitude");
        $longitude = $request->get("longitude");
        $element_code = $request->get("element_code");

        $this -> ElementDetail -> explantionInsert($cultural_code,$priority,$latitude,$longitude,$element_code);
        $explantion_max = $this -> ElementDetail -> maxElementDetail();

        return $explantion_max;
    }
    public function explainDelete(Request $request){
        $explantion = $request ->get("explantion");
        $element_detail_code = $request ->get("element_detail_code");

        $this -> ElementDetail -> elementDetailCodeDelete($element_detail_code) ;

        if(count($explantion)){
            for($i = 0 ; $i < count($explantion); $i++) {
                $this->ElementDetail-> elementDetailUpdate($explantion[$i][0],$i+1);
            }
        }
        return $explantion;
    }

    public function explaintionPriority(Request $request){
        $cultural_code = $request -> get("cultural_code");

        $array = $this -> ElementDetail -> explaintionPriority($cultural_code);

        return $array;
    }

    public function culturalElementAllSelect(Request $request)
    {
        $cultural_code = $request->get("cultural_code");

        $array = $this->ElementDetail->culturalElementAllSelect($cultural_code);

        return $array;
    }

    public function ARUpdate(Request $request){
        $element_detail_code = isset($_POST['element_detail_code']) ? $_POST['element_detail_code'] : null ;
        if(Input::hasFile('ar')){
            echo 'upload' ;
            $file = Input::file("ar");

            //받아온 파일의 확장자 떼오기
            $extension = $file->getClientOriginalExtension();
            //새로운 이름 설정
            $element_detail_file = uniqid().'_'.time().".".$extension ;
            //새롭게 폴더 생성해서 파일 저장
            $file->move('uploads', $element_detail_file);
            $this -> ElementDetail -> ARUpdate($element_detail_code,$element_detail_file);
        }
        return $element_detail_code;
    }

}
