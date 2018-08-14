<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />

    <!--ms 밑에 4개 sortalbe사용하기위해서-->
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <!--
    <link rel="stylesheet" href="jqueryui/style.css">
    -->

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>

    <script src="/js/jQuery3.3.1.js"></script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <script src="/js/culture.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCojf9IKqAfeYPYAuRGi-CbRDRxW9KhEtM&amp;language=ja"></script>
    <style>
        div span{
            margin: 0;
            padding: 0;
        }
        h1 h2 h3 h4 {
            display: inline-block;
            margin : 0 ;
            padding: 0;
        }
        ul, li {
            margin: 0;
            padding: 0;
        }

        <!--ms 포인트리스트 스타일-->
            #ms_point_list li span { position: absolute; margin-left: -1.3em; }

        #menu_content_map {z-index: -1 ;}
        #wrap {
            width: 100%;
            height : 650px;
            border : 1px solid black;
        }
        #menu_nav {
            border: 1px solid #D5D5D5;
            border-top: none ;
            height : 700px;
            width: 25%;
            float: left;
            margin-top:70px;

        }
        #menu_nav_check {
            border: 1px solid #BDBDBD;
            border-bottom: none;
            width: 100%;
            height: 50px;
        }
        .nav_check{
            border-bottom: #BDBDBD 1px solid;
            border-top : 1px solid #BDBDBD;
            color : #4B4B4B;
            font-weight: bold;
            width: 32.6% ;
            height : 50px;
            text-align: center;
            float: left;
            line-height: 50px;
            cursor: pointer;
        }
        #menu_nav_check .active {
            background-color: white;
            color : #8C8C8C;
        }
        #menu_nav_content{
            position : relative;
            border: 1px solid #D5D5D5;
            border-top: none ;
            width : 100%;
            height: 650px;
            background: #f2eeee;
        }
        #menu_nav_content .nav_content > span:first-child {
            font-size: 20px;
            font-weight: bold;
            line-height: 38px;
        }
        #menu_nav_content> div:first-child > div {
            width : 100%;
            border-top : 1px solid #D5D5D5;
            margin-top : 15px;
            padding-top: 20px;

        }
        .two-type-culture {
            margin-top : -8px;
        }
        .nav_content {
            padding-top: 15px;
            padding-left: 10px;
            padding-right: 10px;
            display: none;
            width : 100%;
            height: 98px;
        }

        .accordion_title_province{
            font-size:18px;
        }
        .accordion_title_cultural{
            font-size: 15px;
        }

        .accordion_content_province{
            margin: 10px 0;
            width: 88%;
            padding: 0px 15px;
        }
        .accordion_title_cultural{
            float:left ;
            width: 54%;
            margin-right: 5px;
        }
        .detail_button {
            float: left;
            margin-right:5px ;
        }
        .accordion_content_cultural{
            width : 335px ;
            margin: 5px 0;
            padding : 0px 5px;
            background: white;
            padding-left: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #menu_nav_content > div:nth-child(2){
            font-size: 20px;
            font-weight: bold;
            line-height: 38px;
        }
        .input_upload {
            display: inline-block;
        }

        /*file 필드 숨기기*/
        .input_upload input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip:rect(0,0,0,0);
            border: 0;
        }
        .map_upload_button {
            position: absolute;
            top : 15px ;
            right: 10px;
            display: inline-block;
            padding: 10px 10px;
            color: #999;
            font-size: 12px;
            font-weight: bold;
            line-height: normal;
            vertical-align: middle;
            background-color: #fdfdfd;
            cursor: pointer;
            border: 1px solid #D8D8D8;
            border-bottom-color: #e2e2e2;
            border-radius: .25em;
            text-decoration: none !important;

        }
        .upload_img_wrap {
            margin-top: 18px;
            padding:10px;
            height: 300px ;
            border-color : #B4B4B4;
            overflow: auto;
        }
        .illustration_img_each {
            padding: 5px 2px ;
            margin:0 ;
            border-bottom:1px solid #D8D8D8;
            width:100%;
            cursor: pointer;
        }

        .illustration_img_each img:first-child{
            float: left;
            width: 92% ;
        }
        .illustration_img_each div{
            cursor: pointer;
            border-left:1px solid #D8D8D8;
            width:6%;
            line-height:100%;
            float: left;
        }

        /*아이콘*/
        #detail_icon_box img {
            padding : 10px;
            width: 65px;
            height : 65px;
            cursor: pointer;
            z-index:9999;
        }
        /*width="50px" height="50px"  alt="" style="cursor: pointer; z-index:9999"*/

        #menu_content_map{
            float: left;
            background-color:black;
            height: 700px;
            width: 75%;
            margin-top: 70px;
        }

        .culture_register  {
            width: 800px;
            height: 900px;
        }
        .culture_register2{
            width: 800px;
            height: 550px;
        }


        .culture_explanation_language select{
            position: absolute;
            right: 27px;
            top : 30px;
        }
        .culture_name{
            position: absolute;
            top : 10px;
            left: 15px;
            margin: 0;
            padding: 0;
        }

        .culture_detail{
            position: absolute;
            top : 75px;
            left: 15px;
            margin: 0;
            padding: 0;
        }
        .culture_name div:first-child {
            font-weight: bold;
        }
        .culture_detail> div:first-child{
             font-weight: bold;
        }
        .culture_language> div:first-child{
            font-weight: bold;
        }
        .culture_language> div:nth-child(1){
            font-weight: bold;
        }
        .culture_language{
            position: absolute;
            right :50px;
            top : 20px
        }
        .culture_language_minus {
            display: none;
        }
        .culture_two_name > li {
            float: left;
            font-size: 15px;
            width: 40%;
        }
        .modals-color {
            background: #f2eeee;
            z-index : 999 ;
        }
        .modals-color .uk-modal-title {
            border-bottom : 3px solid #231b19 ;
            width : 60% ;
            padding : 5px 0 ;
        }
        .modals-color .culture_explanation{
            width: 100%;
            height: 300px;
            overflow-y: auto;
            background: white;
            margin-top: 15px;
        }
        .modals-color .culture_explanation_language{
            margin: 10px;
            position: relative;
            width: 98% ;
            height: 280px;
            padding-bottom: 10px;
            border-bottom: 2px solid #231b19;
        }
        .modals-color .culture_name input[type='text']{
            width: 300px;
            height: 28px;
            font-size: 14px;
        }
        .modals-color .culture_detail input[type='textarea']{
            font-size: 14px;

        }
        .modals-color #culture_common {
            border-top: 3px solid #231b19;
            width: 100% ;
            margin-top: 15px ;
            padding-top: 10px ;
        }
        .culture_common_image {
            position: relative;
            background: white;
            padding: 20px;
            font-weight: bold;
            font-size: 16px;
        }
        .culture_common_image div:first-child{
            display: inline-block;
        }
        .culture_common_image label{
            position: absolute;
            left : 120px;
            top : 22px
        }
        .culture_common_image img {
            display: block;
            margin-bottom: 10px;
        }
        #culture-image {
            display: none;
        }
        .culture_address{
            margin-top: 10px;
            background: white;
            font-size: 16px;
            padding: 20px;
        }

        .culture-footer{
            margin-top: 15px;
            position: absolute;
            right: 30px;
        }
        .cancel-button {
            border: 1px solid #907b72;
            background: #f2eeee;
            color: #907b72;
            width: 100px;
            height: 39px;
            cursor: pointer;
        }
        .save-button{
            background:#907b72;
            width: 100px;
            height: 39px;
            margin-top: -4px;
            border: 1px solid #907b72 ;
            color: white;
        }
        .one-cultural-update {
            background:#907b72;
            width: 100px;
            height: 39px;
            margin-top: -4px;
            border: 1px solid #907b72 ;
            color: white;
            cursor: pointer;
        }
        .culture_address div:first-child {
            font-size: 16px;
            font-weight: bold;
        }
        /*--------------------- modal 창 --------------------*/
        .infowindow-delete {
            border: 1px solid #907b72;
            background: #907b72;
            color: white;
            cursor: pointer;
            width: 70px;
            height: 30px;
        }
        .qr-create {
            border: 1px solid #907b72;
            background: #907b72;
            color: white;
            cursor: pointer;
            width: 100px;
            height: 30px;
        }
        #ar-image {
            display: none;
        }

    </style>
</head>
<body>
@include('header')
<div id="menu_nav">
    <div id="menu_nav_check">
        <div class="nav_check active" rel="tab1">文化財</div>
        <div class="nav_check" rel="tab2">便益施設</div>
        <div class="nav_check" rel="tab3">解説</div>
    </div>
    <div id="menu_nav_content">
        <div class="nav_content" id="tab1">
            @if(empty($code))
                @else
                <input type="hidden" value="{{$code}}" id="ex_cultural_code">
            @endif
            <span>文化財リスト</span>
            <button id="cultural_register" class="map_upload_button" onmouseover="nav_content_button(this)" href="#modal-sections" uk-toggle>文化財登録</button>
            <div>
                <ul uk-accordion>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">ソウル特別市</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"서울특별시")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">京畿道</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"경기도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">江原道</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"강원도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">忠清北道</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"충청북도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">忠清南道</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"충청남도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">仁川広域市</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"인천광역시")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">大邱広域市</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"대구광역시")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">慶尚北道</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"경상북도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">慶尚南道</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"경상남도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">全羅南道
                        </a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"전라남도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">全羅北道
                        </a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"전라북도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            {{--<button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>--}}
                                            <img src="/image/showIcon.png" class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle >
                                            {{--<button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>--}}
                                            <img src="/image/culturalPlus.png" class="two-type-culture"  data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            {{--<button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>--}}
                                                            <img src="/image/showIcon.png" class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">蔚山広域市</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"울산광역시")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            <button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>
                                            <button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            <button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">釜山広域市</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"부산광역시")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            <button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>
                                            <button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            <button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">大田広域市</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"대전광역시")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            <button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>
                                            <button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            <button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">済州特別自治道</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 350px;">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"제주특별자치도")!== false)
                                        <ll>
                                            <a href="javascript" class="uk-accordion-title accordion_title_cultural" onclick="geocoding('{{$one->cultural_address}}','{{$one -> cultural_code}}','{{$one->cultural_name}}')" >{{$one->cultural_name}}</a>
                                            <button class="detail_button" data-code="{{$one->cultural_code}}" href="#modal-one-show" uk-toggle>보기</button>
                                            <button class="two-type-culture" data-code="{{$one->cultural_code}}" href="#modal-two-register" uk-toggle>문화재+</button>
                                            <div class="uk-accordion-content accordion_content_cultural ">
                                                @foreach($type_two as $two)
                                                    @if($one -> cultural_code == $two->cultural_include)
                                                        <div class="culture_two_name">
                                                            <li>{{$two->cultural_name}}</li>
                                                            <button class="two-detail-button" data-code="{{$two->cultural_code}}" data-include="{{$two->cultural_include}}" href="#modal-two-show" uk-toggle>보기</button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ll>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ll>
                </ul>
            </div>
        </div>
        <form method="post" action="{{URL::to('add_element') }}">
        <div class="nav_content" id="tab2">
            <span>イラスト</span>
            <div class="input_upload">
                <a href="javascript:" onclick="fileUploadAction();" class="map_upload_button">ファイルのアップロード</a>
                <input type="file" id="input_img" multiple/>
            </div>
            <div class="uk-placeholder upload_img_wrap" ></div>
            <div id="detail_icon" style="width: 100% ; height: 180px; font-size: 20px; font-weight: bold;border:1px solid black">
                <span>便益施設アイコン</span>
                <div id="detail_icon_box" style="padding:10px 10px ;height: 142px; border-top: 1px solid black; ">
                    <div>
                        <img src="/image/information.png" data-code=4 class="drag_image" >
                        <img src="/image/restroom.png" data-code=1 class="drag_image">
                    </div>
                    <div>
                        <img src="/image/qricon.png" data-code=2 class="drag_image">
                        <img src="/image/aricon.png" data-code=3 class="drag_image">
                    </div>
                </div>
            </div>
        </div>
        </form>
        <style>
            .audio_register {
                display: none;
            }
            ul.audioNav {
                margin: 0;
                padding: 0;
                float: left;
                list-style: none;
                height: 32px;
                width: 100%;
                font-family:"dotum";
                font-size:12px;
            }
            ul.audioNav li {
                float: left;
                text-align:center;
                cursor: pointer;
                width:82px;
                height: 31px;
                line-height: 31px;
                border-left: none;
                font-weight: bold;
                background: #fafafa;
                overflow: hidden;
                position: relative;
                border-radius:5px 5px 0 0 ;
                border : 1px solid #907b72
            }
            ul.audioNav li.active {
                background: #FFFFFF;
                border-bottom: 1px solid #FFFFFF;
            }
            .audio_container {
                border: 1px solid #5D5D5D;
                border-top: none;
                clear: both;
                float: left;
                width: 330px;
                background: #FFFFFF;
                height: 100px;
            }
            .audio_content {
                padding: 5px;
                font-size: 12px;
                display: none;
                position: relative;
            }
            .audio_container .audio_content ul {
                width:100%;
                margin:0px;
                padding:0px;
            }
            .audio_container .audio_content ul li {
                padding:5px;
                list-style:none
            }
            .audioGuide {
                width : 330px;
            }
            .audio-ment-register{
                 border: 1px solid #907b72;
                 background: #907b72;
                 color: white;
                 width: 60px;
                 position: absolute;
                 right: 15px;
                 height: 21px;
                 font-size: 12px;
             }
            .audio-ment-update{
                 border: 1px solid #907b72;
                 background: #907b72;
                 color: white;
                 width: 60px;
                 position: absolute;
                 right: 75px;
                 height: 21px;
                 font-size: 12px;
            }
            .audio-ment-delete{
                border: 1px solid #907b72;
                background: #907b72;
                color: white;
                width: 60px;
                position: absolute;
                right: 10px;
                height: 21px;
                font-size: 12px;
            }
            /*.audio-end-point{*/
                /*position: absolute;*/
                /*top: 70px;*/
                /*width: 97%;*/
                /*height: 30px;*/
                /*background: #f2eeee;*/
                /*padding: 5px;*/
            /*}*/
            /*.audio-end-point span {*/
                /*margin-left: 20px;*/
            /*}*/
            /*.audio-end-point input:nth-child(2){*/
                /*margin-left: 60px;*/
            /*}*/
            /*.audio-end-point input{*/
                /*width: 50px;*/
                /*height: 24px;*/
            /*}*/
            /*.audio-end-point img {*/
                /*margin-left: 10px;*/
                /*cursor: pointer;*/
            /*}*/
            .section-end-point{
                position: absolute;
                top: 100px;
                width: 97%;
                height: 30px;
                background: #f2eeee;
                padding: 5px;
                margin-bottom: 10px;
            }
            .section-end-point input{
                width: 40px;
                height: 24px;
            }
            .section-end-point span{
                margin-left: 10px;
            }
            .section-start-end{
                position : absolute;
                top: 135px;
                height: 30px;
                background: #f2eeee;
                width: 97%;
                padding: 5px;
            }
            .section-start-end span{
                margin-left: 10px;
            }
            .section-start-end span:nth-child(2n-1){
                font-weight: bold;
            }
            .section-plusicon{
                position : absolute;
                top: 170px;
                right: 0px;
                height: 30px;
                padding: 5px;
            }

        </style>
        <div class="nav_content" id="tab3">
            <!-- 해설부분 codename:민석-->
            <div>
                <div style="font-size: 20px; font-weight: bold;" id="explan_cultural_name">解説ポイント</div>
                <img src="image/explantion.png" style="width: 50px; height: 50px; margin: 10px;" class="drag_image priority">
            </div>
            <div style="display: none" id="explanation_show">
                <div id="startGuide" class="audioGuide">
                    <div style='font-size: 20px; font-weight: bold;' >案内スタートのコメント</div>
                    <ul class="audioNav startNav">
                        <li class="active" rel="startTab1">韓国語</li>
                        <li rel="startTab2">英語</li>
                        <li rel="startTab3">中国語</li>
                        <li rel="startTab4">日本語</li>
                    </ul>
                    <div class="audio_container">
                        <div id="startTab1" class="start_content audio_content">
                            <label for="startAudio_1">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="startAudio_1" class='audio_register'>
                            <button onclick="startAudioRegister(6)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>

                        </div>
                        <div id="startTab2" class="start_content audio_content">
                            <label for="startAudio_2">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="startAudio_2" class='audio_register'>
                            <button onclick="startAudioRegister(6)" class="audio-ment-register">登録</button>
                            <audio src='' controls></audio>
                        </div>
                        <div id="startTab3" class="start_content audio_content">
                            <label for="startAudio_3">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="startAudio_3" class='audio_register'>
                            <button onclick="startAudioRegister(6)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                        </div>
                        <div id="startTab4" class="start_content audio_content">
                            <label for="startAudio_4">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="startAudio_4" class='audio_register'>
                            <button onclick="startAudioRegister(6)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                        </div>
                    </div>
                    {{--<div style='font-size: 20px; font-weight: bold;' >안내시작멘트</div>--}}
                    {{--<input type='hidden' value='start'>--}}
                    {{--<input type='file' class='audio_register'>--}}
                    {{--<audio src='' controls style='height: 30px;margin-top: 20px'></audio>--}}
                </div>
                <div style='margin-top: 20px' id="endGuide" class="audioGuide">
                    <div style='font-size: 20px; font-weight: bold;' >案内終了のコメント</div>
                    <ul class="endNav audioNav">
                        <li class="active" rel="endTab1">韓国語</li>
                        <li rel="endTab2">英語</li>
                        <li rel="endTab3">中国語</li>
                        <li rel="endTab4">日本語</li>
                    </ul>
                    <div class="audio_container">
                        <div id="endTab1" class="end_content audio_content">
                            <label for="endAudio_1">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="endAudio_1" class='audio_register'>
                            <button onclick="startAudioRegister(9)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                        </div>
                        <div id="endTab2" class="end_content audio_content" >
                            <label for="endAudio_2">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="endAudio_2" class='audio_register'>
                            <button onclick="startAudioRegister(9)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                        </div>
                        <div id="endTab3" class="end_content audio_content">
                            <label for="endAudio_3">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="endAudio_3" class='audio_register'>
                            <button onclick="startAudioRegister(9)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                        </div>
                        <div id="endTab4" class="end_content audio_content">
                            <label for="endAudio_4">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="endAudio_4" class='audio_register'>
                            <button onclick="startAudioRegister(9)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                        </div>
                    </div>

                </div>
                <div style='margin-top: 20px' id="sectionGuide" class="audioGuide">
                    <div style='font-size: 20px; font-weight: bold;' >豆知識  まめちしき</div>
                    <ul class="sectionNav audioNav">
                        <li class="active" rel="secTab1">韓国語</li>
                        <li rel="secTab2">英語</li>
                        <li rel="secTab3">中国語</li>
                        <li rel="secTab4">日本語</li>
                    </ul>
                    <div class="audio_container" style="overflow-y:scroll;">
                        <div id="secTab1" class="section_content audio_content">
                            <div>
                                <label for="sectionAudio_1">
                                    <img src="/image/fileSelect.png">
                                </label>
                                <input type='file' id="sectionAudio_1" class='audio_register'>
                                <button onclick="startAudioRegister(8)" class="audio-ment-register">登録</button>
                                <audio src='' controls ></audio>
                                <div class="section-end-point">
                                    <span>修了ポイント</span>
                                    <input type="text" width="20">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <img src="/image/plusIcon.png">
                                </div>
                                <div style="background: #907b72; position: absolute; top: 140px;" >
                                    <span>start : </span>
                                    <input type="text" width="20">
                                    <span>end : </span>
                                    <input type="text" width="20">
                                </div>
                            </div>
                        </div>
                        <div id="secTab2" class="section_content audio_content">
                            <label for="sectionAudio_2">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="sectionAudio_2" class='audio_register'>
                            <button onclick="startAudioRegister(8)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                            <div class="section-end-point">
                                <span>修了ポイント</span>
                                <input type="text" width="20">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                                <img src="/image/plusIcon.png">
                            </div>
                        </div>
                        <div id="secTab3" class="section_content audio_content">
                            <label for="sectionAudio_3">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="sectionAudio_3" class='audio_register'>
                            <button onclick="startAudioRegister(8)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                            <div class="section-end-point">
                                <span>修了ポイント</span>
                                <input type="text" width="20">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                                <img src="/image/plusIcon.png">
                            </div>
                        </div>
                        <div id="secTab4" class="section_content audio_content">
                            <label for="sectionAudio_4">
                                <img src="/image/fileSelect.png">
                            </label>
                            <input type='file' id="sectionAudio_4" class='audio_register'>
                            <button onclick="startAudioRegister(8)" class="audio-ment-register">登録</button>
                            <audio src='' controls ></audio>
                            <div class="section-end-point">
                                <span>修了ポイント</span>
                                <input type="text" width="20">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                                <img src="/image/plusIcon.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="menu_content_map"></div>
{{--지도 띄우는 스크립트문
    1. draggable :false : 지도 확대 막는 부분
--}}
{{--문화재 등록 모달 창--}}
<div id="modal-sections"  uk-modal>
    <div class="uk-modal-dialog culture_register modals-color" >
        <button class="uk-modal-close-default" type="button" uk-close></button>
        {{--<div class="uk-modal-header">--}}
            {{--<h2 class="uk-modal-title">문화재 등록</h2>--}}
        {{--</div>--}}
        <form action="{{URL::to('upload') }}" method="post" enctype="multipart/form-data">
            <div class="uk-modal-body">
                <h2 class="uk-modal-title">文化財登録</h2>
                <input type="hidden" value="1" name="culture_type">
                <div class="culture_explanation">
                    <div class="culture_explanation_language" >
                        <select class="language_select">
                            <option value="korean" selected>韓国語</option>
                            <option value="english">英語</option>
                            <option value="chinese">中国語</option>
                            <option value="japanese">日本語</option>
                        </select>
                        <div class="culture_name">
                            <div>文化財の名前</div>
                            <input type="text" name="korean_name" placeholder="仏国寺">
                        </div>
                        <div class="culture_detail">
                            <div>文化財の</div>
                            <textarea name="korean_text" id="" cols="83" rows="5" placeholder="대한불교조계종 11교구본사(敎區本寺)의 하나로 그 경내(境內)는 2009년 12월 21일에 사적 제502호로 지정되었으며 1995년 세계문화유산목록에 등록되었다."></textarea>
                        </div>
                    </div>
                </div>
                <div class="add-plus-minus">
                    {{--<span uk-icon="icon: plus" class="culture_language_plus"></span>--}}
                    <img src="/image/PlusIcon.png" class="culture_language_plus" alt="">
                    <img src="/image/minusIcon.png" class="culture_language_minus" alt="">
                    {{--<span uk-icon='icon: minus' class='culture_language_minus'></span>--}}
                </div>
                <div id="culture_common">
                    <div class="culture_common_image">
                        <div>文化財の写真</div>
                        <label for="culture-image">
                            <img src="/image/fileSelect.png" alt="">
                        </label>
                        <input type="file" data-code="0" id="culture-image" class="img_upload_file" name="culture" multiple/>
                        <img src="http://placehold.it/200x200" class="culture_images" style="width: 180px; height: 180px" >
                    </div>
                    <div class="culture_address">
                        <div>文化財のアドレス</div>
                        <input type="type" size="85px" name="culture_address" placeholder="경북 경주시 진현동 산15">
                    </div>
                </div>
                <div class="culture-footer">
                    <button class="cancel-button uk-modal-close" type="button">Cancel</button>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="submit" class="save-button" value="SAVE">
                </div>
            </div>
        </form>
    </div>
</div>
{{--type : 1 문화재 show 모달 창--}}
<div id="modal-one-show"  uk-modal>
    <div class="uk-modal-dialog culture_register modals-color">
        <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-body">
                <h2 class="uk-modal-title one_cultural_name"></h2>
                <input type="hidden" value="1" name="culture_type">
                <div class="culture_explanation">
                </div>
                <div id="culture_common">
                    <div class="culture_common_image">
                        <div>文化財の写真</div>
                        <img src="" class="culture_image" style="width: 200px; height: 200px" >
                    </div>
                    <div class="culture_address">
                        <div>文化財のアドレス</div>
                        <div></div>
                    </div>
                </div>
                <div class="culture-footer">
                    <button class="cancel-button uk-modal-close" type="button">Cancel</button>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <button class="one-cultural-update">UPDATE</button>
                </div>
            </div>
    </div>
</div>
{{--type : 2 문화재 show 모달 창--}}
<div id="modal-two-show"  uk-modal>
    <div class="uk-modal-dialog culture_register2 modals-color">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-body">
            <h2 class="uk-modal-title two_cultural_name">文化財登録</h2>
            <div class="culture_explanation">
            </div>
            <div class="culture-footer">
                <button class="cancel-button uk-modal-close" type="button">Cancel</button>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <button class="one-cultural-update">UPDATE</button>
            </div>
        </div>
    </div>
</div>
{{--type : 2 문화재 등록 모달 창--}}
<div id="modal-two-register"  uk-modal>
    <div class="uk-modal-dialog culture_register2 modals-color">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        {{--<div class="uk-modal-header">--}}
            {{--<h2 class="uk-modal-title">불국사 문화재 등록</h2>--}}
        {{--</div>--}}
        <form action="{{URL::to('upload') }}" method="post" enctype="multipart/form-data">
            <div class="uk-modal-body">
                <h2 class="uk-modal-title">文化財登録</h2>
                <input type="hidden" value="2" name="culture_type">
                <input type="hidden" value="" name="culture_code" class="culture_code">
                <div class="culture_explanation">
                    <div class="culture_explanation_language" >
                        <select class="language_select">
                            <option value="korean" selected>韓国語</option>
                            <option value="english">英語</option>
                            <option value="chinese">中国語</option>
                            <option value="japanese">日本語</option>
                        </select>
                        <div class="culture_name">
                            <div>文化財の名前</div>
                            <input type="text" name="korean_name">
                        </div>
                        <div class="culture_detail">
                            <div>文化財の説明</div>
                            <textarea name="korean_text" id="" cols="80" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="add-plus-minus">
                    <img src="/image/PlusIcon.png" class="culture_language_plus" alt="">
                    <img src="/image/minusIcon.png" class="culture_language_minus" alt="">
                </div>
                <div class="culture-footer">
                    <button class="cancel-button uk-modal-close" type="button">Cancel</button>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="submit" class="save-button" value="SAVE">
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .audio_file{
        height: 108px;
        position: relative;
        background: #907b72;
        padding: 10px ;
        font-size: 16px;
        font-weight: bold;
        border: 1px solid black;
        margin-bottom: 10px;
    }
    .audio_file audio {
        height: 30px;
        top:33px;
        right:10px;
        position: absolute;
    }
    .audio_file > span:first-child {
        color: white;
    }
    .file-select-audio{
        position : absolute;
        top: 35px;
        left : 175px;
    }
    .audio-end-point{
        position: absolute;
        top: 70px;
        width: 97%;
        height: 30px;
        background: #f2eeee;
        padding: 5px;
    }
    .audio-end-point span {
        margin-left: 20px;
    }
    .audio-end-point input:nth-child(2){
        margin-left: 35px;
    }
    .audio-end-point input{
        width: 50px;
        height: 24px;
    }
    .audio-end-point img {
        margin-left: 10px;
        cursor: pointer;
    }
</style>
{{-- 해설포인트 클릭시 모달 창--}}
<div id="modal-explanation"  uk-modal>
    <div class="uk-modal-dialog explantion_size modals-color" style="height: 620px;">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        {{--<div class="uk-modal-header">--}}
            {{--<h2 class="uk-modal-title">음성 파일 등록</h2>--}}
        {{--</div>--}}
            <div class="uk-modal-body audio_contents" style="padding: 10px 15px !important;">
                <h2 class="uk-modal-title">音声ファイルの登録</h2>
                <div class="audio_content_display">
                    <div>
                        <input type="hidden" value="" class="detail-file-code" name="element_detail_code">
                        <div>
                            <div class='audio_file'>
                                <span style='display: inline-block; position: absolute; top:30px'>韓国語の音声ファイル: </span>
                                <input type="hidden" value="korean">
                                <label for="audio_korea">
                                    <img src="/image/fileSelect.png" class="file-select-audio">
                                </label>
                                <input type='file' id="audio_korea" class='audio_register' name='korean' value='음성파일 등록'>
                                <audio src='' controls></audio>
                                <div class="audio-end-point">
                                    <span>修了ポイント</span>
                                    <input type="text" width="20">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <img src="/image/plusIcon.png">
                                </div>
                            </div>
                            <div class='audio_file'>
                                <span style='display: inline-block; position: absolute; top:30px'>英語の音声ファイル :</span>
                                <input type="hidden" value="english">
                                <label for="audio_english">
                                    <img src="/image/fileSelect.png" class="file-select-audio">
                                </label>
                                <input type='file' id="audio_english" class='audio_register' name='english' value='음성파일 등록'>
                                <audio src='' controls></audio>
                                <div class="audio-end-point">
                                    <span>修了ポイント</span>
                                    <input type="text" width="20">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <img src="/image/plusIcon.png">
                                </div>
                            </div>
                            <div class='audio_file'>
                                <span style='display: inline-block; position: absolute; top:30px'>中国語の音声ファイル :</span>
                                <input type="hidden" value="chinese">
                                <label for="audio_chinese">
                                    <img src="/image/fileSelect.png" class="file-select-audio">
                                </label>
                                <input type='file' id="audio_chinese" class='audio_register' name='chinese' value='음성파일 등록'>
                                <audio src='' controls></audio>
                                <div class="audio-end-point">
                                    <span>修了ポイント</span>
                                    <input type="text" width="20">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <img src="/image/plusIcon.png">
                                </div>
                            </div>
                            <div class='audio_file'>
                                <span style='display: inline-block; position: absolute; top:30px'>日本語の音声ファイル:</span>
                                <input type="hidden" value="japanaese">
                                <label for="audio_japanaese">
                                    <img src="/image/fileSelect.png" class="file-select-audio">
                                </label>
                                <input type='file' id="audio_japanaese" class='audio_register' name='japanaese' value='음성파일 등록'>
                                <audio src='' controls></audio>
                                <div class="audio-end-point">
                                    <span>修了ポイント</span>
                                    <input type="text" width="20">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <img src="/image/plusIcon.png">
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="audio_reg_show"></div>
            </div>
            <div class="audio_content_display culture-footer">
                <button class="cancel-button" type="button">Cancel</button>
                <button class="save-button" type="button" onclick="explanationDeleteMarker()">Delete</button>
            </div>
            <div class="audio_reg_show_footer culture-footer" style="display:none">
                <button class='cancel-button uk-modal-close' type='button'>Cancel</button>
                <button class='save-button'>UPDATE</button>
            </div>

    </div>
</div>
</body>
</html>