<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ModelController extends Controller
{
    public function login()
    {
        $id = $_POST['id'];
        $password = $_POST['password'];

        $guests = [
            $id,
            $password
        ];

        $result = DB::select('select * from member where id="root"');
        /*
                var_dump($result);
                echo "<br>";
                print_r($result);
                echo "<br>";
        */

        $rid = $result[0]->id;
        $rpwd =  $result[0]->pw;

        if($id == $rid){
            if($password == $rpwd){
                //로그인 성공 시
                return view('main', compact('guests'));
            }
            else{
                //비밀번호 틀렸을 때 경고창
                echo "<script> alert('pwd miss')</script>";
            }
        }
        else{
            //아이디 틀렸을 때 경고창
            echo "<script> alert('id miss')</script>";
        }
        // id or pwd 틀렸을때 login창 다시 소환
        return view('login');

        /*
                foreach ($r as $result) {
                    var_dump($r);
                }
        */
        //return redirect('/main',compact($guests));


    }

}

