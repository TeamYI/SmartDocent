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
             ->where("language_code","=","1")
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
}
