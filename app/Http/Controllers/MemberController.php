<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MemberController extends Controller
{
    public function member_get(){
        $result = DB::select("select * from member");
        /*
        foreach($result as $r){
            echo $r->id,"&nbsp";
            echo $r->pw."<br>";
        }
        */
        return view('member_manager',compact('result'));
    }
    
    public function member_serch(){
        $s_id = $_POST['serch_id'];
        $result = DB::select("select * from member where id = '$s_id'");
        return view('member_manager',compact('result'));
    }
    public function member_update(){
        $u_id = $_POST['update_id'];
        $u_pw = $_POST['update_pw'];
        $u_user = [$u_id,$u_pw];
        return view('member_update1',compact('u_user'));
    }
    public function member_delete(){
        $d_id = $_POST['delete_id'];
        DB::delete("delete from member where id = '$d_id'");
        $result = DB::select("select * from member");
        return view('member_manager',compact('result'));
    }
}
