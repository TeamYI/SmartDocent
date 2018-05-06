{{-- 문화재 관리창 --}}
<html>
<head>

    <style>
        ul, li {list-style:none; margin:0; padding:0; font-size:10pt; }

        .image_list {clear:both;overflow: hidden;position: relative;height: 100%; width: 100%; border:1px solid #e1e1e1; }
        .image_list .images {position:absolute; display:none;  height:100%; width:100%;}

        .tab {width:600px;cursor:pointer;}
        .tab li {width:70px;float:left;border-right:1px solid #e1e1e1;border-top:1px solid #e1e1e1;padding:7px;}
        .tab li.fir {border-left:1px solid #e1e1e1;}

        .tab_icon {width:600px;cursor:pointer;}
        .tab_icon li {float:left;}

        .tab li.tabOutClass {font-weight:normal;color:#707070;background-color:#D0D0D0}
        .tab li.tabOverClass {font-weight:bold;color:#000;background-color:#fff;}

        /*#secExplain {
            width:100%;
            min-height:500px;
            margin-left : 10%;
            margin-top : 10%;
        }*/
    </style>
<script type="text/javascript">
    function addSection(){
        document.getElementById("msSection").innerHTML = "Paragraph changed!";
    }
</script>
</head>
<body>
@include('header')
<div style="margin-top: 70px"></div>

<ul class="tab" id="tab">
    <li class="tabOutClass fir tabOverclass" overcss="tabOverClass" outcss="tabOutClass fir">
        한국어</li>
    <li class="tabOutClass" overcss="tabOverClass" outcss="tabOutClass">
        English</li>
    <li class="tabOutClass" overcss="tabOverClass" outcss="tabOutClass">
        中文</li>
    <li class="tabOutClass" overcss="tabOverClass" outcss="tabOutClass">
        日本語</li>
</ul>

<div class="image_list" id="image_list">
    <div class="images content_frame" style="display:block"><!-- content_frame 클래스를 반드시 포함해야 합니다.-->
        {{--  @if(!empty($cultural_info))
              @foreach($cultural_info as $one)
               @if($one->language_code == 1)

                   {{$one->cultural_name}}
               @endif
              @endforeach
          @endif--}}
        <div {{--id="secExplain"--}} style="width:100%; height:100%; margin-top:3%">
            {{--<div style="width:100%;">
                <span style="width:10%; float:left"></span>
                <span style="width:16%; float:left"><img src="image/start.png" style="width:50px; height:50px;"></span>
                <span style="width:16%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></span>
                <span style="width:16%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></span>
                <span style="width:16%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></span>
                <span style="width:16%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></span>
                <span style="width:10%; float:left"><img src="image/end.png" style="width:50px; height:50px;"></span>
                <hr align=left; style="border:none; border:2px solid; clear:both; width:90%; ">
            </div>
            <h6>
                <div style="width:10%;  float:left"></div>
                <div style="width:16%;  float:left">{{$data_file_name[4]['data_file_name']}}</div>
                <div style="width:16%; float:left">{{$data_file_name[2]['data_file_name']}}</div>
                <div style="width:16%; float:left">{{$data_file_name[0]['data_file_name']}}</div>
                <div style="width:16%; float:left">{{$data_file_name[1]['data_file_name']}}</div>
                <div style="width:16%; float:left">{{$data_file_name[3]['data_file_name']}}</div>
                <div style="width:10%; float:left" >{{$data_file_name[5]['data_file_name']}}</div>
            </h6>
            <div style="width:100%; height:50%; margin-top:70px">--}}

            <div style="width:100%; height:50px">
                <div style="width:7%; height:100%; float:left"></div>
                <div style="width:16%; height:100%; float:left"><img src="image/start.png" style="width:50px; height:50px;"></div>
                <div style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:100%;"></div>
                <div style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></div>
                <div style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></div>
                <div style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></div>
                <div style="width:13%; height:100%; float:left"><img src="image/end.png" style="width:50px; height:50px;"></div>
            </div>
            <div style="width:100%; height:1px">
                <div style="width:7%;height:100%; float:left"></div>
                <div style="border-top: 1px solid black; width:80%;height:100%; float:left"></div>
            </div>
            <div style="width:100%; height:4% ">
                <div style="width:7%; height:100%; float:left"></div>
                <div style="width:16%; height:100%; float:left">{{$data_file_name[4]['data_file_name']}}</div>
                <div style="width:16%; height:100%; float:left">{{$data_file_name[2]['data_file_name']}}</div>
                <div style="width:16%; height:100%; float:left">{{$data_file_name[0]['data_file_name']}}</div>
                <div style="width:16%; height:100%; float:left">{{$data_file_name[1]['data_file_name']}}</div>
                <div style="width:16%; height:100%; float:left">{{$data_file_name[3]['data_file_name']}}</div>
                <div style="width:13%; height:100%; float:left">{{$data_file_name[5]['data_file_name']}}</div>
            </div>
            <div style="width:100%; height:5%">
                {{--나니모나이--}}
            </div>
            {{--ms--}}
            {{--<div id="msSection"style="width:100%; height:50%">
                <div id="1th" style="width:100%; height:10%">
                        <div style="width:23%; height:50%; float:left"></div>
                        <div style="border : 1px solid black; width:48%; height:50%; float:left; text-align:center; font-size:12px">
                            @foreach($element_info_1 as $one)
                                @foreach($element_info_2 as $two)
                                    @if($one->element_detail_code == $two->element_detail_code)
                                        파일명 : {{$two->data_file_name}} , 시간 : {{$two->duration}}
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div style="width:100%; height:50%; float:left"></div>
                </div>
            </div>--}}
            <div style="width:100%; height:50%">
                @foreach($element_info_1 as $one)
                    @foreach($element_info_2 as $two)
                        @if($one->element_detail_code == $two->element_detail_code)
                            <div id=1th style='width:100%; height:10%'>
                                <div style="width:<?PHP print 7+16*($one->section_start)?>%; height:50%; float:left"></div>
                                <div style="border : 1px solid black; width:<?PHP print 16*($one->section_end-$one->section_start) ?>%; height:50%; float:left; text-align:center; font-size:12px">
                                    파일명 : <?PHP print $two->data_file_name ?> , 시간 : <?PHP print $two->duration ?>
                                </div>
                                <div style="width:100%; height:50%; float:left"></div>
                           </div>

                        @endif
                    @endforeach
                @endforeach
            </div>

        <div class="images content_frame">
            English version page<br>
            @if(!empty($cultural_info))
                @foreach($cultural_info as $one)
                    @if($one->language_code == 2)
                        {{$one->cultural_name}}
                    @endif
                @endforeach
            @endif
        </div>
        <div class="images content_frame">
            中文 version page<br>
            @if(!empty($cultural_info))
                @foreach($cultural_info as $one)
                    @if($one->language_code == 3)
                        {{$one->cultural_name}}
                    @endif
                @endforeach
            @endif
        </div>
        <div class="images content_frame">
            日本語 version page<br>
            @if(!empty($cultural_info))
                @foreach($cultural_info as $one)
                    @if($one->language_code == 4)
                        {{$one->cultural_name}}
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>

<script type="text/javascript">
    <!--
    new tabView({menu:"tab", menuTag:"LI", callEvent:"click", imageArea:"image_list", imageTag:"DIV"});

    function tabView(json){

        if(json.callEvent == "mouseover"){
            e(json.menu).onmouseover = function(event){
                var tabs = tn(e(json.menu), json.menuTag);
                var evt = event || window.event;
                var t = evt.target || evt.srcElement;

                for(n in tabs){
                    if(tabs[n] == t){
                        viewContent(n);
                        rollOver(t);
                        break;
                    }
                }
            }
        }else if(json.callEvent == "click"){
            e(json.menu).onclick = function(event){
                var tabs = tn(e(json.menu), json.menuTag);
                var evt = event || window.event;
                var t = evt.target || evt.srcElement;

                for(n in tabs){
                    if(tabs[n] == t){
                        viewContent(n);
                        //rollOver(event.srcElement);
                        rollOver(t);
                        break;
                    }
                }
            }
        };


        //내용 보이기
        function viewContent(nIdx){
            var els = tn(e(json.imageArea), json.imageTag);
            if(els.length == 0) return;
            var arr = new Array();

            for(n=0; n<els.length; n++){
                if(els[n].getAttribute('class').indexOf('content_frame') > 0 ){
                    arr.push(els[n]);
                }
            }

            for(n=0; n<arr.length; n++){
                if(typeof arr[n]=="object"){
                    if(n==nIdx){
                        arr[n].style.display = "block";
                    }else{
                        arr[n].style.display = "none";
                    }
                }
            }
        }

        //라벨 onmouseover 시 클래스 적용
        function rollOver(obj){
            //if(c.label == null) return;
            //var els = c.label.getElementsByTagName(c.labelType);
            var els = tn(e(json.menu), json.menuTag);
            if(els.length==0) return;

            if(json.menuTag == "IMG"){
                for(n in els){
                    if(typeof els[n] == "object"){
                        if(els[n] == obj){
                            els[n].src = els[n].getAttribute("oversrc");
                        }else{
                            els[n].src = els[n].getAttribute("outsrc");
                        }
                    }
                }
            }else{
                for(n in els){
                    if(typeof els[n] == "object"){
                        if(els[n] == obj){
                            var ocss = els[n].className;
                            els[n].className = ocss+" "+els[n].getAttribute("overcss");
                        }else{
                            els[n].className = els[n].getAttribute("outcss");
                        }
                    }
                }
            }
        }// e function rollOver(obj){
    }


    //객체 반환
    function e(id){
        return document.getElementById(id);
    }

    //pa에 속한 태그들 반환
    function tn(pa, tagName){
        return pa.getElementsByTagName(tagName);
    }
    //-->
</script>

</body>
</html>