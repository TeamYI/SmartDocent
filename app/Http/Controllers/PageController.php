<?php
namespace App\Http\Controllers;

use App\pages;
use App\Cultural;
use App\CulturalDetail;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $Cultural;
    private $CulturalDetail;
    public function __construct()
    {
        $this->Cultural = new Cultural() ;
        $this->CulturalDetail = new CulturalDetail() ;
    }

    public function login()
    {
        return view('login');
    }

    public function member_manage()
    {
        return view('member_manager');
    }

    public function cultural_manage()
    {

        return view('cultural_manage');
    }

    public function member_update(){
        $u_id = $_POST['update_id'];
        $u_pw = $_POST['update_pw'];
        $u_user = [$u_id,$u_pw];
        return view('member_update1',compact('u_user'));
    }

    public function main()
    {
        echo "안녕하세요" ;
        return view('/main');
    }

    public function manage_list(){
        $list = $this->CulturalDetail->first_cultural_list_show();
        return view('manage_list') -> with("list",$list);
    }
}