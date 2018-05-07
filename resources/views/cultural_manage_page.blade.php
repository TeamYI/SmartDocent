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
            <script>
                function button() {
                    alert("aa");
                }

                var lat1 ;
                var long1 ;
                var imgTag1 ;
                var sibling1 ;
                $(document).ready(function(){

                    $(".move-place").click(function(e){
                        var offsetX = e.pageX; //클릭한 곳의 x좌표
                        var offsetY = e.pageY;
                        var imgTag2 = $(this).children('img');
                        var lat2 = Number($(this).attr("data-lat"));
                        var long2 = Number($(this).attr("data-long"));
                        var position = $(this).attr("data-code");
                        var temp ;
                        var code ;
                        var sibling2 = $(this).next().attr("data-code");



                        // 안내시작에서 첫번째 해설 포인트 갈 때
                        if(lat1 == null && long1 == null) {
                            lat1 = lat2;
                            long1 = long2;
                            imgTag1 = imgTag2;
                            sibling1 = sibling2;
                        }else if(sibling1 != position){
                            console.log("경로이탈 했습니다.");
                        }else{

                            var distance1 = distance(Number(lat2),Number(long2));
                            var time = distance1*1000/0.33;

                            console.log(distance1);
                            console.log(parseInt(time/60));
                            console.log(parseInt(time%60));
                            console.log(typeof(offsetX-200));
                            if(position != 'end') {
                                $(this).before("<div class='timeShow' style='position: absolute ; left:" + (offsetX - 200) + "px'>예상도착시간 : "+ parseInt(time) +"초</div>");
                            }
                            $(".1th").each(function(){
                                var start = $(this).attr("data-start");
                                var end = $(this).attr("data-end");
                                var sectionTime = $(this).attr("data-time");
                                var sectionCode = $(this).attr("data-code");

                                console.log($(this).attr("data-code"));
                                // console.log($(this).attr("data-end"));
                                console.log("start : " + start<=position );
                                console.log("end : " +position <= end );
                                if(start<position && position <= end){
                                    console.log("time : " + $(this).attr("data-time"));
                                    console.log("time -s :" + parseInt(time));
                                    if(temp == null){
                                        console.log("sectionCode : "+ sectionCode);
                                        temp = parseInt(time)-sectionTime ;
                                        code = sectionCode;
                                    }
                                    else if(parseInt(time)-sectionTime < temp){
                                        console.log("sectionCode : "+ sectionCode);
                                        temp = parseInt(time)-sectionTime ;
                                        code = sectionCode;
                                    }
                                }
                            });

                        }
                        if(sibling1 != position && position != 1){
                            $("#course_error").css("background","red");
                            sibling1 = sibling2;
                        }else{
                            $(".1th[data-code="+code+"] > .section-update ").css("background","red");
                            sibling1 = sibling2;
                        }

                        alert("y : "+offsetY + " X :" + offsetX);
                        var image = $("#image");
                        if(imgTag1 != null) {
                            imgTag1.attr("src", "image/explantion.png");
                        }
                        image.animate({
                            left : offsetX
                        },5000, function(){
                            lat1 = lat2;
                            long1 = long2;
                            $(".timeShow").remove();
                            $(".1th[data-code="+code+"] > .section-update ").css("background","white");
                            $("#course_error").css("background","white");
                            if(position != 'end') {
                                imgTag2.attr("src", "image/explanation-select.png");
                                imgTag1 = imgTag2;
                            }


                        })
                    });


                })


                Number.prototype.toRad = function() {
                    return this * Math.PI / 180;
                }

                function distance(lat2,long2){
                    var R = 6371 ;
                    console.log("dataType =" +typeof(lat2) )
                    var dLat = (lat2-lat1).toRad();
                    var dLon = (long2-long1).toRad();

                    var a = Math.sin(dLat/2)*Math.sin(dLat/2)+
                        Math.cos(lat1.toRad())*Math.cos(lat2.toRad())*
                        Math.sin(dLon/2)*Math.sin(dLon/2);
                    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                    var d = R * c;
                    return d;
                }

            </script>
            <div style="width:100%; height:50px">
                <div style="width:7%; height:100%; float:left"></div>
                <img src="image/aa.png" id="image" width="35px" height="35px" alt="" style="position: absolute; top:80px">
                <div style="width:16%; height:100%; float:left"><img src="image/start.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964312" data-long="128.6215455" data-code="1" style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:100%;"></div>

                <div class="move-place" data-lat="35.8965864" data-long="128.621251" data-code="2" style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964647" data-long="128.620998" data-code="3" style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;" ></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:16%; height:100%; float:left"><img src="image/explantion.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-code='end' style="width:13%; height:100%; float:left"><img src="image/end.png" style="width:50px; height:50px;"></div>
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

            <div style="width:100%; ">
                <h3 style="margin-left: 7%;">구간이탈멘트</h3>
                @foreach($element_info_1 as $one)
                    @foreach($element_info_2 as $two)
                        @if($one->element_detail_code == $two->element_detail_code)
                            <div class="1th" style='width:100%; height:10%' data-code="{{$one->element_detail_code}}" data-time='{{$two->duration}}' data-start="{{$one->section_start}}" data-end="{{$one->section_end}}">
                                <div style="width:<?PHP print 7+16*($one->section_start)?>%; height:50%; float:left"></div>
                                <div class="section-update" style="border : 1px solid black; width:<?PHP print 16*($one->section_end-$one->section_start) ?>%; height:50%; float:left; text-align:center; font-size:12px">
                                    파일명 : <?PHP print $two->data_file_name ?> , 시간 : <?PHP print $two->duration ?>
                                </div>
                                <div style="width:100%; height:50%; float:left"></div>
                           </div>
                        @endif
                    @endforeach
                @endforeach
                <div style="width:100%; height:1px">
                    <div style="width:7%;height:100%; float:left"></div>
                    <div style="border-top: 2px solid black; width:80%;height:100%; float:left"></div>
                </div>
            </div>

            <div style="width:100%; height:20% ; margin-top: 20px">

                <div style="width:7%;height:50%; float:left"></div>
                <h3>경로이탈멘트</h3>
                <div id="course_error" style="border:1px solid black; width:15%;height:25%; float:left;text-align:center; font-size:12px">
                    파일명 : warning.m4a
                </div>
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