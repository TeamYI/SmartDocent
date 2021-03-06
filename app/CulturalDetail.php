<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CulturalDetail extends Model
{
    protected $table = 'cultural_detail';
    //
    public function cultural(){
        return $this->belongsTo('\App\Cultural');
    }
    public function cultural_explain($cultural_code,$language_code,$cultural_name,$cultural_text,$type){
        CulturalDetail::insert([
            'cultural_code' => $cultural_code,
            'language_code'=> $language_code,
            'cultural_name' => $cultural_name,
            'cultural_detail_explain' => $cultural_text
        ]);
    }

    public function cultural_explain_two($code,$language_code,$cultural_name,$cultural_text,$type,$cultural_code){
        CulturalDetail::insert([
            'cultural_code' => $code,
            'language_code'=> $language_code,
            'cultural_name' => $cultural_name,
            'cultural_detail_explain' => $cultural_text,
            'cultural_include' => $cultural_code
        ]);
    }

    public function cultural_list_two(){
         return CulturalDetail::whereNotNull("cultural_include")
             ->where("language_code","=","4")
            ->select("cultural_detail_code","cultural_code","cultural_detail_explain","cultural_name","cultural_include")
            ->get();
    }

    public function cultural_two_show($cultural_code,$cultural_include){
        return CulturalDetail::join("language as b","b.language_code","=","cultural_detail.language_code")
            ->where("cultural_include","=",$cultural_include)
            ->where("cultural_code","=",$cultural_code)
            ->select("*")
            ->get();
    }

//1차문화재 목록
    public function first_cultural_list_show(){
        return CulturalDetail::select("cultural_name","cultural_code")
            ->where("cultural_include","=",null)
            ->where("language_code","=",1)
            ->get();
    }

    public function cultural_info($cultural_code){
        return CulturalDetail::where("cultural_include","=",$cultural_code)
        ->select("cultural_name","language_code")
        ->get();
    }
    public function language_cultural_name($cultural_code){
        return CulturalDetail::where("cultural_code","=",$cultural_code)
            ->select("cultural_name","language_code")
            ->get();
    }
}
