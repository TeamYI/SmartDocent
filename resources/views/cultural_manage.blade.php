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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCojf9IKqAfeYPYAuRGi-CbRDRxW9KhEtM
"></script>

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
            width: 20%;
            float: left;
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

        #menu_content_map{
            float: left;
            background-color:black;
            height: 650px;
            width: 79.7%;

        }

        .culture_register  {
            width: 800px;
            height: 850px;
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
            border-bottom: 1px solid #6c757d;
            width: 98% ;
            height: 190px;
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
        #culture_language_plus {
            border: 1px solid black;
        }
        #culture_language_minus {
            border: 1px solid black;
            display: none;
        }

    </style>

</head>
<body>
@include('header')
<div id="menu_nav">
    <div id="menu_nav_check">
        <div class="nav_check active" rel="tab1">문화재</div>
        <div class="nav_check" rel="tab2">지도</div>
        <div class="nav_check" rel="tab3">해설</div>
    </div>
    <div id="menu_nav_content">
        <div class="nav_content" id="tab1">
            <span>문화재 리스트</span>
            <button id="cultural_register" class="map_upload_button" onmouseover="nav_content_button(this)" href="#modal-sections" uk-toggle>문화재 등록</button>
            <div>
                <ul uk-accordion>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">서울특별시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>
                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">경기도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">강원도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">충청북도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">충청남도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">인천광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">대구광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">경상북도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">경상남도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">전라남도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">전라북도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">울산광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">부산광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">대전광역시</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                    <ll>
                        <a href="#" class="uk-accordion-title accordion_title_province">제주도</a>
                        <div class="uk-accordion-content accordion_content_province">
                            <ul uk-accordion>
                                <ll>
                                    <a href="#" class="uk-accordion-title accordion_title_cultural">경기도</a>
                                    <div class="uk-accordion-content accordion_content_cultural ">
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>
                                        <li>dddddddd</li>

                                    </div>
                                </ll>
                            </ul>

                        </div>
                    </ll>
                </ul>
            </div>
        </div>
        <div class="nav_content" id="tab2">
            <div>
                <span>일러스트</span>
                <div class="input_upload">
                    <a href="javascript:" onclick="fileUploadAction();" class="map_upload_button ">파일 업로드</a>
                    <input type="file" id="input_img" multiple/>
                </div>
                <div class="uk-placeholder upload_img_wrap" ></div>
            </div>
            <div id="detail_icon" style="width: 100% ; height: 180px; background: red; font-size: 20px; font-weight: bold;">
                <span>상세 아이콘</span>
                <div id="detail_icon_box" style="padding:0 5px ;;width:96.6% ; height: 142px; background: gray">
                    <img src="/image/information.png" data-code='info.png' class="drag_image" width="50px" height="50px"  alt="" style="cursor: pointer; z-index:9999">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                </div>
            </div>
        </div>


        <div class="nav_content" id="tab3">
            <!-- 해설부분 codename:민석-->
            <div>
                <span>해설</span>
            </div>
            <div>
                <img id = "ms_img" src="/image/number_1.png" data-code='number' class="drag_image" width="50px" height="50px" alt="" style="cursor: pointer">
            </div>
            <div class="uk-placeholder upload_img_wrap" >
                <!--ms포인트리스트-->
                <ul id = "ms_point_list" ></ul>
                <span id ="ms_php_code"></span>

            </div>
            <div>
                <input type="submit" value = "수정" onclick="">
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
        <div class="uk-modal-body">
            <div class="culture_explanation">
                <div class="culture_explanation_language" >
                    <select>
                        <option value="korean" selected>한국어</option>
                        <option value="english">영어</option>
                        <option value="Chinese">중국어</option>
                        <option value="Japanese">일본어</option>
                    </select>
                    <div class="culture_name">
                        <div>문화재명</div>
                        <input type="text">
                    </div>
                    <div class="culture_detail">
                        <div>문화재 설명</div>
                        <textarea name="" id="" cols="90" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div id="add-plus-minus">
                <span uk-icon="icon: plus" id="culture_language_plus"></span>
                <span uk-icon='icon: minus' id='culture_language_minus'></span>
            </div>
            <div id="culture_common" style="border-top:1px solid black ; width: 100%; gin: 10px">
                <div>
                    <div style="display: inline-block ; width: 32%; height:250px" class="culture_image" >
                        <div>문화재 사진</div>
                        <input type="file" data-name="image" class="img_upload_file">
                        <img src="http://placehold.it/200x200" class="culture_images" style="width: 200px; height: 200px" >
                    </div>
                    <div style="display: inline-block ; width: 32%; height: 250px" class="culture_qr">
                        <div>QR코드</div>
                        <input type="file" data-name="qr" class="img_upload_file">
                        <img src="http://placehold.it/200x200" class="culture_images" style="width: 200px; height: 200px">
                    </div>
                    <div style="display: inline-block; width: 32%; height: 250px" class="culture_ar">
                        <div>AR</div>
                        <input type="file" data-name="ar" class="img_upload_file">
                        <img src="http://placehold.it/200x200" alt="" class="culture_images" style="width: 200px; height: 200px">
                    </div>
                </div>
                <div>
                    <div>문화재 주소</div>
                    <input type="type" size="100px">
                </div>
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button" onclick="submitAction();">Save</button>
        </div>
    </div>
</div>

</body>
</html>