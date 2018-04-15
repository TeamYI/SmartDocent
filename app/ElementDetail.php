<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementDetail extends Model
{
    //
    protected $table = "element_detail";
    public $timestamps = false;

    public function explantionInsert($cultural_code,$priority,$latitude,$longitude,$element_code){
        ElementDetail::insert([
            'cultural_code' => $cultural_code,
            'element_priority' => $priority,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'element_code' => $element_code,

        ]);
    }
    public function maxElementDetail(){
        return ElementDetail::select("element_detail_code")
            ->whereRaw('element_detail_code = (select max(`element_detail_code`) from element_detail)')->get();
    }

    public function elementDetailUpdate($element_detail_code, $element_priority){
        ElementDetail::where("element_detail_code","=",$element_detail_code)
            ->update([
                "element_priority" => $element_priority
            ]);
    }

    public function elementDetailCodeDelete($element_detail_code){
        ElementDetail::where("element_detail_code","=",$element_detail_code)
            ->delete();
    }

    public function culturalCodeSelect($element_detail_code){
        return ElementDetail::where("element_detail_code","=",$element_detail_code)
            ->select("cultural_code")
            ->first()["cultural_code"];
    }

    public function explaintionPriority($cultural_code){
        return ElementDetail::join('cultural as a','a.cultural_code','=','element_detail.cultural_code')
            ->join("cultural_detail as b","b.cultural_code",'=',"element_detail.cultural_code")
            ->where("element_detail.cultural_code","=",$cultural_code)
            -> select("*")
            -> get();
    }


}
