{{-- 문화재 관리창 --}}
<html>
<head>
    <script src="/js/jQuery3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
    <script src="js/modernizr.custom.js"></script>
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

                    $(".1th[data-code="+code+"] > .section-update ").css("background","red");



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
                        if(position != 'end') {

                            if(sibling1 != position && position != 1){
                                console.log("달라");
                                $("#course_error").css("background","red");
                                setTimeout(function(){
                                    imgTag2.attr("src", "image/explanation-select.png");
                                    $("#course_error").css("background","white");
                                },3000);
                                sibling1 = sibling2;
                            }else{
                                imgTag2.attr("src", "image/explanation-select.png");
                            }
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
</head>
<body>
@include('header')
<div style="margin-top: 80px"></div>
    <div class="tabs tabs-style-linemove">
        <nav>
            <ul>
                <li><a href="#section-linemove-1" class="icon icon-home"><span>한국어</span></a></li>
                <li><a href="#section-linemove-2" class="icon icon-box"><span>English</span></a></li>
                <li><a href="#section-linemove-3" class="icon icon-display"><span>中文</span></a></li>
                <li><a href="#section-linemove-4" class="icon icon-upload"><span>日本語</span></a></li>
            </ul>
        </nav>
        <div class="content-wrap">
            <section id="section-linemove-1" style="padding:40px;">
                <h2 style="margin-left: 7%; margin-bottom:40px">영진전문대</h2>
                <div style="width:100%; height:50px">
                    <div style="width:7%; height:100%; float:left"></div>
                    <img src="image/aa.png" id="image" width="35px" height="35px" alt="" style="position: absolute; top:140px">
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
        </section>
        <section id="section-linemove-2"><div>English</div></section>
        <section id="section-linemove-3"><p>中文</p></section>
        <section id="section-linemove-4"><p>日本語</p></section>
    </div><!-- /content -->
</div><!-- /tabs -->
<script src="js/cbpFWTabs.js"></script>
<script>
    (function() {

        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
            new CBPFWTabs( el );
        });

    })();
</script>
</body>
</html>