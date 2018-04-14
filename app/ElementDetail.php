<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementDetail extends Model
{
    protected $table = 'element_detail';
    public $timestamps = false; // 얘를 안쓰면 update_at을 멋대로 씀;


    public function add_element($element_code, $latitude, $longitude)
    {
        ElementDetail::insert([
            'element_code' => $element_code,
            'latitude' => $latitude,
            'longitude' => $longitude
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
        ElementDetail::$table
            ->where('element_detail_code',$element_detail_code)
            ->delete();
    }

}
