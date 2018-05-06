<?php

namespace App\Http\Controllers;

use App\ElementDetail;
use Illuminate\Http\Request;
use App\AudioDataFile;
use \Input as Input;

class AudioDataFileController extends Controller
{
    private $AudioDataFile;
    private $ElementDetail;
    public function __construct()
    {
        $this-> AudioDataFile = new AudioDataFile() ;
        $this-> ElementDetail = new ElementDetail();
    }

    public function audioRegister(){
        $element_detail_code = isset($_POST['element_detail_code']) ? $_POST['element_detail_code'] : null ;
        echo $element_detail_code ;
        if(Input::hasFile('korean')){
            $music_file = Input::file("korean");
            $extension = $music_file->getClientOriginalExtension();
            $music_name = uniqid().'_'.time().".".$extension ;
            $music_file -> move('audio', $music_name);

            $this -> AudioDataFile -> dataFileInsert($element_detail_code,$music_name,1);
        }
        if(Input::hasFile('english')){
            $music_file = Input::file("english");
            $extension = $music_file->getClientOriginalExtension();
            $music_name = uniqid().'_'.time().".".$extension ;
            $music_file -> move('audio', $music_name);

            $this -> AudioDataFile -> dataFileInsert($element_detail_code,$music_name,2);
        }
        if(Input::hasFile('chinese')){
            $music_file = Input::file("chinese");
            $extension = $music_file->getClientOriginalExtension();
            $music_name = uniqid().'_'.time().".".$extension ;
            $music_file -> move('audio', $music_name);

            $this -> AudioDataFile -> dataFileInsert($element_detail_code,$music_name,3);
        }
        if(Input::hasFile('japanaese')){
            $music_file = Input::file("japanaese");
            $extension = $music_file->getClientOriginalExtension();
            $music_name = uniqid().'_'.time().".".$extension ;
            $music_file -> move('audio', $music_name);

            $this -> AudioDataFile -> dataFileInsert($element_detail_code,$music_name,4);
        }
        $cultural_code = $this->ElementDetail->culturalCodeSelect($element_detail_code);
        return redirect()->route('upload.cultureManager',['cultural_code'=> $cultural_code]);

    }

    public function audioSelect(Request $request){
        $element_detail_code = $request->get("element_detail_code");

        $array = $this -> AudioDataFile -> audioFileSelect($element_detail_code);

        return $array;
    }
    //안내 시작멘트 안내종료 멘트 구간멘트
    public function audioAjaxUpload(Request $request){
        $element_code = isset($_POST['element_code']) ? $_POST['element_code'] : null ;
        $cultural_code = isset($_POST['cultural_code']) ? $_POST['cultural_code'] : null ;
        $language_code = isset($_POST['language_code']) ? $_POST['language_code'] : null ;

        $extension = "";
        if(Input::hasFile('audio')){
            $music_file = Input::file("audio");
            $extension = $music_file->getClientOriginalExtension();
            $music_name = uniqid().'_'.time().".".$extension ;
            $music_file -> move('audio', $music_name);

            $this -> ElementDetail -> add_element($cultural_code,$element_code,0,0);
            $element_detail_code = $this -> ElementDetail -> element_max();
            $element_detail_code = $element_detail_code[0]['element_detail_code'];
            $this -> AudioDataFile -> dataFileInsert( $element_detail_code,$music_name,$language_code);
            return $element_detail_code;
        }
//        else if(Input::hasFile('english')){
//            $a ="c";
//            $music_file = Input::file("english");
//            $extension = $music_file->getClientOriginalExtension();
//            $music_name = uniqid().'_'.time().".".$extension ;
//            $music_file -> move('audio', $music_name);
//            $this -> AudioDataFile -> dataFileInsert($element_detail_code,$music_name,2);
//        }else if(Input::hasFile('chinese')){
//            $a ="c";
//            $music_file = Input::file("chinese");
//            $extension = $music_file->getClientOriginalExtension();
//            $music_name = uniqid().'_'.time().".".$extension ;
//            $music_file -> move('audio', $music_name);
//            $this -> AudioDataFile -> dataFileInsert($element_detail_code,$music_name,3);
//        }else if(Input::hasFile('japanaese')){
//            $a ="c";
//            $music_file = Input::file("japanaese");
//            $extension = $music_file->getClientOriginalExtension();
//            $music_name = uniqid().'_'.time().".".$extension ;
//            $music_file -> move('audio', $music_name);
//            $this -> AudioDataFile -> dataFileInsert($element_detail_code,$music_name,4);
//        }


        return $music_name;
    }
}
