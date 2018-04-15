<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ElementDetail;

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
}
