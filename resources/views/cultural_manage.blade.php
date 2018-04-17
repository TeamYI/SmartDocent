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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCojf9IKqAfeYPYAuRGi-CbRDRxW9KhEtM"></script>

    <!-- ms sortable 쓰기위해서 필요하데-->
    <script>
        $(function() {
            $( "#ms_point_list" ).sortable();
            $( "#ms_point_list" ).disableSelection();
        });
    </script>

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
            height : 650px;
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
            height: 600px;

        }
        #menu_nav_content> div:first-child > span {
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
        .nav_content {
            padding-top: 15px;
            padding-left: 10px;
            padding-right: 10px;
            display: none;
            width : 91.8%;
            height: 98px;
        }

        .accordion_title_province{
            font-size:18px;
        }
        .accordion_title_cultural{
            font-size: 17px;
        }

        .accordion_content_province{
            margin: 10px 0;
            width: 88%;
            padding: 0px 15px;
        }
        .accordion_title_cultural{
            float:left ;
            width: 40%;
            margin-right: 5px;
        }
        .detail_button {
            float: left;
            margin-right:5px ;
        }
        .accordion_content_cultural{
            margin: 5px 0;
            padding : 0px 5px;
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
            margin-top: 10px;
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
            height: 650px;
            width: 75%;
            margin-top: 70px;
        }

        .culture_register  {
            width: 800px;
            height: 850px;
        }
        .culture_register2{
            width: 800px;
            height: 550px;
        }

        .culture_explanation{
            width: 100%;
            height: 300px;
            overflow-y: auto;
            background: #ced4da;
        }
        .culture_explanation_language {
            margin: 10px;
            position: relative;
            border: 1px solid #6c757d;
            width: 98% ;
            height: 270px;
        }
        .culture_explanation_language select{
            position: absolute;
            right: 18px;
            top : 30px;
        }
        .culture_name{
            position: absolute;
            top : 10px;
            left: 15px;
            margin: 0;
            padding: 0;
        }
        .culture_name input[type='text']{
            width: 300px;
            height: 20px;
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
        .culture_image div:first-child {
            font-weight: bold;
            font-size: 18px;
        }
        .culture_address div:first-child{
            font-weight: bold;
            font-size: 18px;
        }
        .culture_language_plus {
            border: 1px solid black;
        }
        .culture_language_minus {
            border: 1px solid black;
            display: none;
        }
        .culture_two_name > li {
            float: left;
        }
        .labels {
            font-size: 20px;
            color: red;
        }

    </style>
</head>
<body>
@include('header')
<div id="menu_nav">
    <div id="menu_nav_check">
        <div class="nav_check active" rel="tab1">문화재</div>
        <div class="nav_check" rel="tab2">편의시설</div>
        <div class="nav_check" rel="tab3">해설</div>
    </div>
    <div id="menu_nav_content">
        <div class="nav_content" id="tab1">
            @if(empty($code))
                @else
                <input type="hidden" value="{{$code}}" id="ex_cultural_code">
            @endif
            <span>문화재 리스트</span>
            <button id="cultural_register" class="map_upload_button" onmouseover="nav_content_button(this)" href="#modal-sections" uk-toggle>문화재 등록</button>
            <div>
                <ul uk-accordion>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">서울특별시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"서울특별시")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">경기도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"경기도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">강원도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"강원도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">충청북도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"충청북도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">충청남도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"충청남도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">인천광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"인천광역시")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">대구광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"대구광역시")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">경상북도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"경상북도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">경상남도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"경상남도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">전라남도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"전라남도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">전라북도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"전라북도")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">울산광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
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
                        <a href="#" class="uk-accordion-title accordion_title_province">부산광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"서울특별시")!== false)
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
                        <a href="#" class="uk-accordion-title accordion_title_province">대전광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
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
                        <a href="#" class="uk-accordion-title accordion_title_province">제주도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion style="width: 300px">
                                @foreach($type_one as $one)
                                    @if(strpos($one->cultural_address ,"제주도")!== false)
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
            {{--<div>--}}
                {{--<span>일러스트</span>--}}
                {{--<div class="input_upload">--}}
                    {{--<a href="javascript:" onclick="fileUploadAction();" class="map_upload_button ">파일 업로드</a>--}}
                    {{--<input type="file" id="input_img" multiple/>--}}
                {{--</div>--}}
                {{--<div class="uk-placeholder upload_img_wrap" ></div>--}}
            {{--</div>--}}
            <div id="detail_icon" style="width: 100% ; height: 180px; font-size: 20px; font-weight: bold;border:1px solid black">
                <span>상세 아이콘</span>
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

        <div class="nav_content" id="tab3">
            <!-- 해설부분 codename:민석-->
            <div>
                <div style="font-size: 20px; font-weight: bold;" id="explan_cultural_name">해설포인트</div>
                <img src="image/explantion.png" style="width: 50px; height: 50px; margin: 10px;" class="drag_image priority">
            </div>
            <div style="display: none" id="explanation_show">
                <div style='margin-top: 20px' id="startGuide">
                    <div style='font-size: 20px; font-weight: bold;' >안내시작멘트</div>
                    <input type='hidden' value='start'>
                    <input type='file' class='audio_register'>
                    <audio src='' controls style='height: 30px;margin-top: 20px'></audio>
                </div>
                <div style='margin-top: 20px' id="endGuide">
                    <input type='hidden' value='end'>
                    <div style='font-size: 20px; font-weight: bold;'>안내종료멘트</div>
                    <input type='file' class='audio_register'>
                    <audio src='' controls style='height: 30px;margin-top: 20px'></audio>
                    </div>
                <div style='margin-top: 20px' id="sectionGuide">
                    <div style='font-size: 20px; font-weight: bold;'>구간멘트</div>
                    <input type='file' class='audio_register'>
                    <audio src='' controls style='height: 30px;margin-top: 10px'></audio>
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
    <div class="uk-modal-dialog culture_register">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">문화재 등록</h2>
        </div>
        <form action="{{URL::to('upload') }}" method="post" enctype="multipart/form-data">
            <div class="uk-modal-body">
                <input type="hidden" value="1" name="culture_type">
                <div class="culture_explanation">
                    <div class="culture_explanation_language" >
                        <select class="language_select">
                            <option value="korean" selected>한국어</option>
                            <option value="english">영어</option>
                            <option value="chinese">중국어</option>
                            <option value="japanese">일본어</option>
                        </select>
                        <div class="culture_name">
                            <div>문화재명</div>
                            <input type="text" name="korean_name" placeholder="불국사">
                        </div>
                        <div class="culture_detail">
                            <div>문화재 설명</div>
                            <textarea name="korean_text" id="" cols="80" rows="5" placeholder="대한불교조계종 11교구본사(敎區本寺)의 하나로 그 경내(境內)는 2009년 12월 21일에 사적 제502호로 지정되었으며 1995년 세계문화유산목록에 등록되었다."></textarea>
                        </div>
                    </div>
                </div>
                <div class="add-plus-minus">
                    <span uk-icon="icon: plus" class="culture_language_plus"></span>
                    <span uk-icon='icon: minus' class='culture_language_minus'></span>
                </div>
                <div id="culture_common" style="border-top:1px solid black ; width: 100%;  margin: 10px">
                    <div>
                        <div style="display: inline-block ; width: 32%; height:250px" class="culture_image" >
                            <div>문화재 사진</div>
                            <input type="file" data-code="0" class="img_upload_file" name="culture">
                            <img src="http://placehold.it/200x200" class="culture_images" style="width: 200px; height: 200px" >
                        </div>
                    </div>
                    <div class="culture_address">
                        <div>문화재 주소</div>
                        <input type="type" size="85px" name="culture_address" placeholder="경북 경주시 진현동 산15">
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="submit" class="uk-button uk-button-primary" value="SAVE">
                </div>
            </div>
        </form>
    </div>
</div>
{{--type : 1 문화재 show 모달 창--}}
<div id="modal-one-show"  uk-modal>
    <div class="uk-modal-dialog culture_register">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title one_cultural_name"></h2>
        </div>
            <div class="uk-modal-body">
                <input type="hidden" value="1" name="culture_type">
                <div class="culture_explanation">
                </div>
                <div id="culture_common" style="border-top:1px solid black ; width: 100%;  margin: 10px">
                    <div>
                        <div style="display: inline-block ; width: 32%; height:250px" class="culture_image" >
                            <div>문화재 사진</div>
                            <img src="" class="culture_images" style="width: 200px; height: 200px" >
                        </div>
                    </div>
                    <div class="culture_address">
                        <div>문화재 주소</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <button class="uk-button uk-button-primary one-cultural-update">UPDATE</button>
            </div>
    </div>
</div>
{{--type : 2 문화재 show 모달 창--}}
<div id="modal-two-show"  uk-modal>
    <div class="uk-modal-dialog culture_register2">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title two_cultural_name">2차 문화재 등록</h2>
        </div>
        <div class="uk-modal-body">
            <div class="culture_explanation">
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">DELETE</button>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <button class="uk-button uk-button-primary one-cultural-update">UPDATE</button>
        </div>
    </div>
</div>
{{--type : 2 문화재 등록 모달 창--}}
<div id="modal-two-register"  uk-modal>
    <div class="uk-modal-dialog culture_register2">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">불국사 문화재 등록</h2>
        </div>
        <form action="{{URL::to('upload') }}" method="post" enctype="multipart/form-data">
            <div class="uk-modal-body">
                <input type="hidden" value="2" name="culture_type">
                <input type="hidden" value="" name="culture_code" class="culture_code">
                <div class="culture_explanation">
                    <div class="culture_explanation_language" >
                        <select class="language_select">
                            <option value="korean" selected>한국어</option>
                            <option value="english">영어</option>
                            <option value="chinese">중국어</option>
                            <option value="japanese">일본어</option>
                        </select>
                        <div class="culture_name">
                            <div>문화재명</div>
                            <input type="text" name="korean_name">
                        </div>
                        <div class="culture_detail">
                            <div>문화재 설명</div>
                            <textarea name="korean_text" id="" cols="80" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="add-plus-minus">
                    <span uk-icon="icon: plus" class="culture_language_plus"></span>
                    <span uk-icon='icon: minus' class='culture_language_minus'></span>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="submit" class="uk-button uk-button-primary" value="SAVE">
            </div>
        </form>
    </div>
</div>
{{-- 해설포인트 클릭시 모달 창--}}
<div id="modal-explanation"  uk-modal>
    <div class="uk-modal-dialog explantion_size">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">음성 파일 등록</h2>
        </div>
            <div class="uk-modal-body audio_content">
                <div class="audio_content_display">
                    <div>
                        <input type="hidden" value="" class="detail-file-code" name="element_detail_code">
                        <div>
                            <div class='audio_file' style='height: 80px; position: relative; border-bottom: 1px solid black'>
                                <span style='display: inline-block; position: absolute; top:30px'>한국어 음성 파일 : </span>
                                <input type="hidden" value="korean">
                                <input type='file' class='audio_register' name='korean' value='음성파일 등록'>
                                <audio src='' controls  style='height: 30px; top:30px; right:100px; position: absolute; '></audio>
                            </div>
                            <div class='audio_file' style='height: 80px; position: relative; border-bottom: 1px solid black'>
                                <span style='display: inline-block; position: absolute; top:30px'>영어 음성 파일 :</span>
                                <input type="hidden" value="english">
                                <input type='file' class='audio_register' name='english' value='음성파일 등록'>
                                <audio src='' controls  style='height: 30px; top:30px; right:100px; position: absolute; '></audio>
                            </div>
                            <div class='audio_file' style='height: 80px; position: relative; border-bottom: 1px solid black'>
                                <span style='display: inline-block; position: absolute; top:30px'>중국어 음성 파일 :</span>
                                <input type="hidden" value="chinese">
                                <input type='file' class='audio_register' name='chinese' value='음성파일 등록'>
                                <audio src='' controls  style='height: 30px; top:30px; right:100px; position: absolute; '></audio>
                            </div>
                            <div class='audio_file' style='height: 80px; position: relative; border-bottom: 1px solid black'>
                                <span style='display: inline-block; position: absolute; top:30px'>일본어 음성 파일 :</span>
                                <input type="hidden" value="japanaese">
                                <input type='file' class='audio_register' name='japanaese' value='음성파일 등록'>
                                <audio src='' controls  style='height: 30px; top:30px; right:100px; position: absolute; '></audio>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="audio_reg_show"></div>
            </div>
            <div class="uk-modal-footer uk-text-right audio-show-footer">
                <div class="audio_content_display">
                    <button class="uk-button uk-button-default" type="button" onclick="explanationDeleteMarker()">Delete</button>
                </div>
                <div class="audio_reg_show_footer" style="display:none">
                    <button class='uk-button uk-button-default uk-modal-close' type='button'>Delete</button>
                    <button class='uk-button uk-button-primary'>UPDATE</button>
                </div>
            </div>
    </div>
</div>
</body>
</html>