<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultural extends Model
{
    protected $table = 'cultural';

    //1차 문화재 등록
    public function cultural_register($type, $address, $cultural_name, $qr_name, $ar_name)
    {
        Cultural::insert([
            'cultural_type' => $type,
            'cultural_address' => $address,
            'cultural_image' => $cultural_name,
            'qr' => $qr_name,
            'ar' => $ar_name
        ]);
    }
    //2차 문화재 등록
    public function cultural_register_two($type){
        Cultural::insert([
           'cultural_type' => $type
        ]);
    }

    // 가장 최근에 등록한 cultural_code 가져옴
    public function cultural_max()
    {
//      $result = DB::select("select * from member");
        return Cultural::select("cultural_code")->whereRaw('cultural_code = (select max(`cultural_code`) from cultural)')->get();
    }

    public function cultural_detail()
    {
        return $this->hasMany('\App\Cultural_detail');
    }
    public function cultural_list()
    {
        return \App\CulturalDetail::join('cultural as a', "a.cultural_code", "=", 'cultural_detail.cultural_code')
            ->where("cultural_detail.language_code", "=", "1")
            ->select('a.cultural_code', 'a.cultural_address', 'a.cultural_type','cultural_detail.cultural_name')
            ->get();
    }
        public function cultural_one_show($cultural_code){
        return Cultural::join('cultural_detail as a', "a.cultural_code", "=", 'cultural.cultural_code')
            ->join("language as b","b.language_code","=","a.language_code")
            ->where("a.cultural_code", "=", $cultural_code)
            ->whereNull("a.cultural_include")
            ->select('cultural.cultural_code', 'cultural.cultural_address', 'cultural.cultural_type','cultural.ar','cultural.qr','cultural.cultural_image','a.cultural_name','a.language_code','a.cultural_detail_explain','a.cultural_detail_code','b.language')
            ->get();
    }
}
