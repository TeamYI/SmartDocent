<?php
namespace App\Http\Controllers;
use App\pages;
use App\Cultural;
use App\CulturalDetail;
use App\AudioDataFile;
use App\ElementDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $Cultural;
    private $CulturalDetail;
    private $AudioDataFile;
    private $ElementDetail; // ElementDetail.php 불러올거임

    public function __construct()
    {
        $this->Cultural = new Cultural() ;
        $this->CulturalDetail = new CulturalDetail() ;
        $this->AudioDataFile = new AudioDataFile();
        $this->ElementDetail = new ElementDetail();
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

        return view('manage_list')->with("list",$list);
    }

    //민석 테스트용
    public function mstest(Request $request){
        $cultural_code = $request->input('cultural_code', 0);
        $cultural_info = $this->CulturalDetail->cultural_info($cultural_code);
        $element_info_1 = $this->ElementDetail->culturalElementMS($cultural_code);
        $element_info_2 = $this->AudioDataFile->dataFileMS();
        $data_file_name = $this->AudioDataFile->file_name();
        $cultural_info1 = $this->CulturalDetail->language_cultural_name($cultural_code);


        return view('cultural_manage_page')->with("cultural_info",$cultural_info)
            ->with("element_info_1",$element_info_1)->with("element_info_2",$element_info_2)
            ->with("data_file_name",$data_file_name)->with("cultural_info1", $cultural_info1);
    }

}