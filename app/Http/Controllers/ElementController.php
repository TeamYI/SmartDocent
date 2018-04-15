<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ElementDetail;

class ElementController extends Controller
{
    
    private $ElementDetail; // ElementDetail.php 불러올거임
    
    public function __construct()
    {

        $this->ElementDetail = new ElementDetail();

    }

    //
    public function add_element(Request $request){
        $element_code = $request->get("element_code");
        $latitude = $request->get("latitude");
        $longitude = $request->get("longitude");
        $cultural_code = $request->get("cultural_code");

        $this->ElementDetail->add_element($element_code,$latitude,$longitude,$cultural_code);

        // max호출하는 걸 만들어야지
        $maxValue = $this->ElementDetail->element_max();

        return $maxValue;
    }

    public function update_element(Request $request){
        $element_detail_code = $request->get("maxValue");
        $element_detail_file = $request->get("element_detail_file");


        gettype($element_detail_code);

        $this->ElementDetail->update_element((int)$element_detail_code,$element_detail_file);

        return $element_detail_file;
    }

    public function del_element(Request $request){

        $element_detail_code = $request->get(id);

        // $this->ElementDetail->del_element($element_detail_code);

        return $element_detail_code;
    }
}
