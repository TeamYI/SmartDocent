<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioDataFile extends Model
{
    //
    protected $table = "data_file" ;

    public function dataFileInsert($element_detail_code,$music_name,$language_code)
    {
        AudioDataFile::insert([
            'element_detail_code' => $element_detail_code,
            'data_file_name' => $music_name,
            'language_code' => $language_code
        ]);
    }

    public function audioFileSelect($element_detail_code){
        return AudioDataFile::join("language as a","a.language_code","=","data_file.language_code")
            ->where("element_detail_code","=",$element_detail_code)
            ->select("*")
            ->get();
    }
    // 파일 리스트 좀 뽑아올게
    public function file_name(){
        return AudioDataFile::select("data_file_name")
            ->where("data_file_code","!=", 5)
            ->where("data_file_code","!=", 7)
            ->where("data_file_code","!=", 8)
            ->get();
    }
//민석
    public function dataFileMS(){
        return AudioDataFile::select("data_file_name","language_code","duration","element_detail_code")
            ->get();
    }
}
//    return CulturalDetail::join("language as b","b.language_code","=","cultural_detail.language_code")
//->where("cultural_include","=",$cultural_include)
//->where("cultural_code","=",$cultural_code)
//->select("*")
//->get();
