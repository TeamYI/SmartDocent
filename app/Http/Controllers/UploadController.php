<?php

namespace App\Http\Controllers;

use App\Cultural;
use App\CulturalDetail;
use App\ElementDetail;
use Illuminate\Http\Request;
use \Input as Input;
use Illuminate\Routing\Route;

class UploadController extends Controller
{
    //
    private $Cultural;
    private $CulturalDetail;
    private $ElementDetail;
    public function __construct()
    {
        $this->Cultural = new Cultural() ;
        $this->CulturalDetail = new CulturalDetail();
        $this->ElementDetail = new ElementDetail();
    }

    public function upload(){
        $type = isset($_POST['culture_type']) ? $_POST['culture_type'] : null ;
        $cultural_code = isset($_POST['culture_code']) ? $_POST['culture_code'] : null ;
        $address = isset($_POST['culture_address']) ? $_POST['culture_address'] : null ;

        $code = ""; //code 변수
        $cultural_name ="" ; //문화재 사진 이름
        $qr_name ="" ; //qr 사진 이름
        $ar_name ="" ; //ar 사진 이름

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
            // 문화재 등록하는 곳
            $this->Cultural->cultural_register($type,$address,$cultural_name);

            //문화재 id 불러오기
            $code = $this->Cultural->cultural_max();
            $cultural_code = $code[0]['cultural_code'];
            echo $cultural_code ;
        }else if($type == 2){
            $this -> Cultural ->cultural_register_two($type);
            $code = $this->Cultural->cultural_max();
            $code = $code[0]['cultural_code'];
        }


        echo "ddddddd" ;
        $language = array("korean","english","chinese","japanese");

        for($i = 0 ; $i < count($language) ; $i++){
            $arrays = [] ;
            $arrays[] = isset($_POST[$language[$i]."_name"]) ? $_POST[$language[$i]."_name"] : null ;
            $arrays[] = isset($_POST[$language[$i]."_text"]) ? $_POST[$language[$i]."_text"] : null ;

            if($arrays[0] != null && $arrays[1] != null){

                if($type == 1){
                    //문화재의 설명
                    $this->CulturalDetail->cultural_explain($cultural_code,$i+1,$arrays[0],$arrays[1],$type);
                }else if($type == 2){
                    $this->CulturalDetail->cultural_explain_two($code,$i+1,$arrays[0],$arrays[1],$type,$cultural_code);
                }
            }
        }

        return redirect(route('upload.cultureManager'));
    }

    //문화재 등록페이지 불러줌
    public function CulturalManageGet(){
        $type_one = $this->Cultural->cultural_list();
        $type_two = $this->CulturalDetail->cultural_list_two();

        return view('cultural_manage',compact('type_one','type_one'),compact('type_two','type_two'));

    }

    public function oneTypeCulturalShow(Request $request){
        $cultural_code =  $request->get("cultural_code");
        $array = $this->Cultural->cultural_one_show($cultural_code);

        return $array ;
    }

    public function twoTypeCulturalShow(Request $request){
        $cultural_code = $request->get("cultural_code");
        $cultural_include = $request->get("cultural_include") ;
        $array = $this->CulturalDetail->cultural_two_show($cultural_code,$cultural_include);

        return $array ;
    }
}
