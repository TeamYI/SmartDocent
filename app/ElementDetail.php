<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementDetail extends Model
{

    protected $table = 'element_detail';
    public $timestamps = false; // 얘를 안쓰면 update_at을 멋대로 씀;


    public function add_element($cultural_code,$element_code, $latitude, $longitude)
    {
        ElementDetail::insert([
            'element_code' => $element_code,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'cultural_code' => $cultural_code
        ]);
    }

    public function element_max()
    {
        return ElementDetail::select("element_detail_code")->whereRaw('element_detail_code = (select max(`element_detail_code`) from element_detail)')->get();
    }

    public function update_element($element_detail_code, $element_detail_file)
    {
        ElementDetail::where('element_detail_code', "=", $element_detail_code)
            ->update([
                'element_detail_file' => $element_detail_file . "",
            ]);

    }

    public function del_element($element_detail_code)
    {
        ElementDetail::where('element_detail_code',"=",$element_detail_code)
            ->delete();
    }


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

    public function culturalElementAllSelect($cultural_code){
        return ElementDetail::leftjoin("data_file as a","a.element_detail_code","=","element_detail.element_detail_code")
            ->where("element_detail.cultural_code","=",$cultural_code)
            ->select("element_detail.element_detail_code", "element_detail.cultural_code","element_detail.element_priority","element_detail.element_detail_file","element_detail.element_code","element_detail.latitude","element_detail.longitude","a.data_file_name","a.language_code")
            ->get();
    }

    public function culturalElementMS($cultural_code){
        return ElementDetail::where("cultural_code","=",$cultural_code)
            ->where("element_code","=",8)
            ->select("element_detail_code","element_detail.section_start","element_detail.section_end")
            ->get();
    }

    public function ARUpdate($element_detail_code,$element_detail_file){
        ElementDetail::where("element_detail_code","=",$element_detail_code)
            ->update([
                "element_detail_file" => $element_detail_file
            ]);
    }
}
