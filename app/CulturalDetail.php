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
    public function cultural_explain($cultural_code,$language_code,$cultural_name,$cultural_text){
        CulturalDetail::insert([
            'cultural_code' => $cultural_code,
            'language_code'=> $language_code,
            'cultural_name' => $cultural_name,
            'cultural_detail_explain' => $cultural_text
        ]);
    }
}
