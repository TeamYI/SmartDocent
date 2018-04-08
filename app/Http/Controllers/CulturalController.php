<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CulturalController extends Controller
{
    public function guide_point_add(){
        $guide_point_code = $_POST['guide_point_code'];
        $first_cultural_code = $_POST['first_cultural_code'];
        $turn = $_POST['turn'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $radius = $_POST['radius'];

        $result = DB::insert("insert into guide_point (guide_point_code,first_cultural_code,turn,latitude,longitude,radius) values (?,?,?,?,?,?)",
           [$guide_point_code,$first_cultural_code,$turn,$latitude,$longitude,$radius]);
        /*
        foreach($result as $r){
            echo $r->id,"&nbsp";
            echo $r->pw."<br>";
        }
        */
        if($result)
            return "success";
        else
            return "no";
    }
}
