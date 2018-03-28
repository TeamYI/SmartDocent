<?php
namespace App\Http\Controllers;

use App\pages;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
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

/*    public function main()
    {
        echo "안녕하세요"
        return view('/main');
    }*/
}