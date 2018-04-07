<?php

namespace App\Http\Controllers;

use App\Cultural;
use App\CulturalDetail;
use Illuminate\Http\Request;
use \Input as Input;
use Illuminate\Routing\Route;

class UploadController extends Controller
{
    //
    private $Cultural;
    private $CulturalDetail;
    public function __construct()
    {
        $this->Cultural = new Cultural() ;
        $this->CulturalDetail = new CulturalDetail();
    }

    public function upload(){
        $type = isset($_POST['culture_type']) ? $_POST['culture_type'] : null ;
        $address = isset($_POST['culture_address']) ? $_POST['culture_address'] : null ;

        $cultural_code = "" ;
        $cultural_name ="" ;
        $qr_name ="" ;
        $ar_name ="" ;
        if($type == 1) {
            $code = "" ;
            if(Input::hasFile('culture')){
                echo 'upload' ;
                $file = Input::file("culture");
                //받아온 파일의 확장자 떼오기
                $extension = $file->getClientOriginalExtension();
                //새로운 이름 설정
                $cultural_name = uniqid().'_'.time().".".$extension ;
                //새롭게 폴더 생성해서 파일 저장
                $file->move('uploads', $cultural_name);
                echo "<img src='/uploads/".$cultural_name."'/>" ;
            }
            if(Input::hasFile('qr')){
                echo 'upload' ;
                $file = Input::file("qr");
                $extension = $file->getClientOriginalExtension();
                $qr_name = uniqid().'_'.time().".".$extension ;
                $file->move('uploads',$qr_name);
                echo "<img src='/uploads/".$qr_name."'/>" ;
            }
            if(Input::hasFile('ar')){
                echo 'upload' ;
                $file = Input::file("ar");
                $extension = $file->getClientOriginalExtension();
                $ar_name = uniqid().'_'.time().".".$extension ;
                $file->move('uploads',$ar_name);
                echo "<img src='/uploads/".$ar_name."'/>" ;
            }
            // 문화재 등록하는 곳
            $this->Cultural->cultural_register($type,$address,$cultural_name,$qr_name,$ar_name);

            //문화재 id 불러오기
            $code = $this->Cultural->cultural_max();
            $cultural_code = $code[0]['cultural_code'];
            echo $cultural_code ;
        }


        echo "ddddddd" ;
        $language = array("korean","english","chinese","japanese");

        for($i = 0 ; $i < count($language) ; $i++){
            $arrays = [] ;
            $arrays[] = isset($_POST[$language[$i]."_name"]) ? $_POST[$language[$i]."_name"] : null ;
            $arrays[] = isset($_POST[$language[$i]."_text"]) ? $_POST[$language[$i]."_text"] : null ;

            if($arrays[0] != null && $arrays[1] != null){
                //문화재의 설명
                $this->CulturalDetail->cultural_explain($cultural_code,$i+1,$arrays[0],$arrays[1]);
            }
        }

        return redirect(route('upload.cultureManager'));
    }

    public function CulturalManageGet(){
        $array = $this->Cultural->cultural_list();
        echo $array;
        return view('cultural_manage',compact('array','array'));
    }

}
