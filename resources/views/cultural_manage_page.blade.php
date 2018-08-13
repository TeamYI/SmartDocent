{{-- 문화재 관리창 --}}
<html>
<head>
    <script src="/js/jQuery3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit-rtl.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/cbpFWTabs.js"></script>
    <script>
        $(document).ready(function(){
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();

        });

        var array = [];
        var arrayImage = [];
        var arrayPosition = [];
        var arraySection = [];

        var timeArray = [22000, 13000, 13000, 6000,6000,10000];

        $(".section-audio").each(function(){
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

        function a(){
            var count = 0;
            console.log("change.g");

            $(".content-current .move-place").each(function(e){
                arrayPosition[count] = new Array(2);
                console.log($(this));
                var offsetX = $(this).offset().left; //클릭한 곳의 x좌표
                var imageSelect = $(this).children();
                var latitude = $(this).attr("data-lat");
                var longtitude = $(this).attr("data-long");
                console.log("x :" + offsetX );
                arrayPosition[count][0] = latitude;
                arrayPosition[count][1] = longtitude;
                arrayImage[count] = imageSelect;
                array[count] = offsetX ;
                count++ ;
            })

            count = 0 ;

            $(".section-audio").each(function(){

                arraySection[count] = new Array(4);
                var sectionCode = $(this);
                var start = $(this).attr("data-start");
                var end = $(this).attr("data-end");
                var sectionTime = $(this).attr("data-time");

                arraySection[count][0] = sectionCode;
                arraySection[count][1] = start;
                arraySection[count][2] = end;
                arraySection[count][3] = sectionTime;

                count++;

            });

            console.log(array);
            console.log(arrayImage);
            console.log(arrayPosition);
            console.log(arraySection);
        }

        var ppCount = 0 ;
        var previous ;
        function ppButton(argA){
                console.log("argA : " + argA);
                console.log(argA.attr("data-name"));
                var name = argA.attr("data-name");
                var section ;

                if(name == "play"){
                    if(ppCount > 0) {
                        previous = ppCount-1 ;
                        /*arrayImage[ppCount-1].attr("src", "image/"+ppCount+"off.png");*/
                    }
                    if(ppCount > 0 && ppCount < 5) {
                        console.log("ppCount : " + ppCount);
                        var distance1 = distance(ppCount);
                        var time = distance1*1000/0.33;
                        if(ppCount != 3){
                            argA.before("<div class='timeShow' style='position: absolute ; left:" + (array[ppCount] -150) + "px'>予想到着時間 : "+ parseInt(time) +"秒</div>");
                        }
                        console.log("time : " + time);
                        section = sectionPlay(ppCount, time);
                    }
                    if(ppCount==2){
                        ppCount = 3 ;
                    }

                    argA.children("img").attr("src","image/pause-bars.png");
                    argA.attr("data-name","pause");
                    console.log("ppcount1 : " + ppCount);
                    ppCount = musicPlay(ppCount, argA, section);
                    console.log("ppcount2 : " + ppCount);
                    ppCount++;
                    if(ppCount == 6) {
                        setTimeout(function () {
                            arrayImage[ppCount-1].attr("src", "image/g_end_off.png");

                        }, 23000);
                    }

                }else{
                    argA.children("img").attr("src","image/black-play-symbol.png");
                    argA.attr("data-name","play");
                }

        }
        function sectionPlay(argA, timeA){
            var start ;
            var end ;
            var time ;
            var preTime = 0;
            var temp ;
            var argB = argA ;
            for(var i=0; i<arraySection.length;i++){
                console.log("arrasse " + arraySection);
                start = arraySection[i][1] ;
                end = arraySection[i][2] ;
                time = arraySection[i][3] ;
                console.log("start :L " + start);
                console.log("end : " + end);
                console.log("argB : " + argB);
                if(argB >= start && argB <= end){
                    if(time <= timeA){
                        if(preTime <= time ) {
                            console.log("도착");
                            preTime = time; //
                            temp = arraySection[i][0] //
                        }
                    }
                }
            }
            console.log("temp : " + temp);
            if(temp != null && argA != 3) {
                console.log("aaa");
                temp.children(".section-update").css("background", "#ff9a55");
            }

            return temp ;
        }
        var check = 0;
        function musicPlay(argA,argB, section){
            console.log("count : " + argA);


            var image = $("#image");
            console.log("check : "+ check);
            if(argA == 0){
                $("#g_start").attr("src", "image/g_start_on.png");
            }
            if(argA != 3 || check == 1) {
                image.animate({
                    left: array[argA]

              }, timeArray[argA], function () {
                    if(argA == 0){
                        $("#g_start").attr("src", "image/g_start_off.png");
                    }
                    if(argA == 5){
                        arrayImage[previous].attr("src", "image/"+(previous+1)+"off.png");
                        arrayImage[5].attr("src", "image/g_end_on.png");
                    }
                    if (argA != 5) {

                        console.log("previous :" + previous);
                        console.log("argA : " + argA);
                        if ((argA != 0 && previous != argA - 1) || argA == 3) {
                            $("#course_error").css("background", "#ff9a55");
                            setTimeout(function () {
                                arrayImage[argA].attr("src", "image/"+([argA+1])+"on.png");
                                $("#course_error").css("background", "#f2eeee");
                            }, 10000);
                            $(".timeShow").remove();
                        } else {
                            if(previous != null){
                                arrayImage[previous].attr("src", "image/"+(previous+1)+"off.png");
                            }
                            arrayImage[argA].attr("src", "image/"+([argA+1])+"on.png");
                            $(".timeShow").remove();
                        }
                    }
                    if (section != null) {
                        section.children(".section-update").css("background", "#f2eeee");
                    }
                    argB.children("img").attr("src", "image/black-play-symbol.png");
                    argB.attr("data-name", "play");
                })
            }else{
                arrayImage[previous].attr("src", "image/"+(previous+1)+"off.png");
                console.log("arraychectk : " + array[argA]);
                image.animate({
                    left: array[argA]-100
                },17000, function () {
                    console.log(section);
                    section.children(".section-update").css("background", "#f2eeee");
                    $(".timeShow").remove();
                    argB.before("<div class='timeShow' style='top: 100px ; font-size: 20px; color:#ff9a55; position: absolute ; left:" + (array[argA+1] -100) + "px'>AR</div>");
                    argB.children("img").attr("src", "image/black-play-symbol.png");
                    argB.attr("data-name", "play");

                })
                check++;
                console.log("arg1 : " + argA);
                argA = argA-1 ;
                console.log("arg2 : " + argA);
            }


            return argA;
        }

        function replayButton(argA){
            var image = $("#image");
            image.css("left","155px")
        }

        // var lat1 ;
        // var long1 ;
        // var imgTag1 ;
        // var sibling1 ;
        // $(document).ready(function(){
        //
        //     $(".move-place").click(function(e){
        //         var offsetX = e.pageX; //클릭한 곳의 x좌표
        //         var offsetY = e.pageY;
        //         var imgTag2 = $(this).children('img');
        //         var lat2 = Number($(this).attr("data-lat"));
        //         var long2 = Number($(this).attr("data-long"));
        //         var position = $(this).attr("data-code");
        //         var temp ;
        //         var code ;
        //         var sibling2 = $(this).next().attr("data-code");
        //
        //
        //
        //         // 안내시작에서 첫번째 해설 포인트 갈 때
        //         if(lat1 == null && long1 == null) {
        //             lat1 = lat2;
        //             long1 = long2;
        //             imgTag1 = imgTag2;
        //             sibling1 = sibling2;
        //         }else{
        //
        //             var distance1 = distance(Number(lat2),Number(long2));
        //             var time = distance1*1000/0.33;
        //
        //             console.log(distance1);
        //             console.log(parseInt(time/60));
        //             console.log(parseInt(time%60));
        //             console.log(typeof(offsetX-200));
        //             if(position != 'end') {
        //                 $(this).before("<div class='timeShow' style='position: absolute ; left:" + (offsetX - 200) + "px'>예상도착시간 : "+ parseInt(time) +"초</div>");
        //             }
        //             $(".1th").each(function(){
        //                 var start = $(this).attr("data-start");
        //                 var end = $(this).attr("data-end");
        //                 var sectionTime = $(this).attr("data-time");
        //                 var sectionCode = $(this).attr("data-code");
        //
        //                 console.log($(this).attr("data-code"));
        //                 // console.log($(this).attr("data-end"));
        //                 console.log("start : " + start<=position );
        //                 console.log("end : " +position <= end );
        //                 if(start<position && position <= end){
        //                     console.log("time : " + $(this).attr("data-time"));
        //                     console.log("time -s :" + parseInt(time));
        //                     if(temp == null){
        //                         console.log("sectionCode : "+ sectionCode);
        //                         temp = parseInt(time)-sectionTime ;
        //                         code = sectionCode;
        //                     }
        //                     else if(parseInt(time)-sectionTime < temp){
        //                         console.log("sectionCode : "+ sectionCode);
        //                         temp = parseInt(time)-sectionTime ;
        //                         code = sectionCode;
        //                     }
        //                 }
        //             });
        //
        //
        //         }
        //
        //         $(".1th[data-code="+code+"] > .section-update ").css("background","red");
        //
        //
        //
        //         alert("y : "+offsetY + " X :" + offsetX);
        //         var image = $("#image");
        //         if(imgTag1 != null) {
        //             imgTag1.attr("src", "image/explantion.png");
        //         }
        //         image.animate({
        //             left : offsetX
        //         },5000, function(){
        //             lat1 = lat2;
        //             long1 = long2;
        //             $(".timeShow").remove();
        //             $(".1th[data-code="+code+"] > .section-update ").css("background","white");
        //             if(position != 'end') {
        //
        //                 if(sibling1 != position && position != 1){
        //                     console.log("달라");
        //                     $("#course_error").css("background","red");
        //                     setTimeout(function(){
        //                         imgTag2.attr("src", "image/explanation-select.png");
        //                         $("#course_error").css("background","white");
        //                     },3000);
        //                     sibling1 = sibling2;
        //                 }else{
        //                     imgTag2.attr("src", "image/explanation-select.png");
        //                 }
        //                 imgTag1 = imgTag2;
        //             }
        //
        //
        //
        //         })
        //     });
        //
        //
        // })
        //


        Number.prototype.toRad = function() {
            return this * Math.PI / 180;
        }

        function distance(argA){
            console.log(arrayPosition);
            var lat1 = Number(arrayPosition[ppCount-1][0]);
            var long1 = Number(arrayPosition[ppCount-1][1]);

            var lat2 = Number(arrayPosition[ppCount][0]);
            var long2 = Number(arrayPosition[ppCount][1]);

            var R = 6371 ;
            console.log("dataType =" +typeof(argA) )
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
<body style="background: #907b72;">
@include('header')
<div style="margin-top: 70px; background: #907b72"></div>
<div class="tabs tabs-style-linemove" style="margin-left: 20px; background: #f2eeee">
    <nav style=" background:#ffffff">
        <ul>
            <li><a href="#section-linemove-1" class="icon"><span>한국어</span></a></li>
            <li><a href="#section-linemove-2" class="icon"><span>English</span></a></li>
            <li><a href="#section-linemove-3" class="icon"><span>中文</span></a></li>
            <li><a href="#section-linemove-4" class="icon"><span>日本語</span></a></li>
        </ul>
    </nav>
    <div class="content-wrap">
        <section id="section-linemove-1" style="padding:40px; background:#f2eeee">
            <div>
            <h2 style="margin-left: 8%;margin-right: 20px ;margin-bottom:40px; display: inline-block">キョンサンガムヨン公園</h2>
                <div class="play-button" data-name="play" onclick="ppButton($(this))" style="display: inline-block; position: absolute; left:50%; top:35px; cursor:pointer;">
                    <img src="image/black-play-symbol.png" width="50px" height="50px" alt="">
                </div>
                <div class="replay-button" data-name="replay" onclick="replayButton($(this))" style="display: inline-block; position: absolute; left:55%; top:35px;cursor:pointer;">
                    <img src="image/replay.png" width="50px" height="50px" alt="">
                </div>
            </div>
            <div style="width:100%; height:55px">
                <div style="width:8%;height:100%; float:left"></div>
                <img src="image/hito.png" id="image" width="35px" height="35px" alt="" style="position: absolute; top:125px">
            </div>
            <div style="width:100%; height:1px">
                <div style="width:8%;height:100%; float:left"></div>
                <div style="border-top: 1px solid black; width:92%;height:100%; float:left"></div>
            </div>
            <div style="width:100%; height:50px" class="ex-group">
                <div style="width:8%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left" ><img src="image/g_start_off.png" id = "g_start" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964312" data-long="128.6215455" data-code="1" style="width:14%; height:100%; float:left"><img src="image/1off.png" style="width:50px; height:100%;"></div>
                <div class="move-place" data-lat="35.8965864" data-long="128.621251" data-code="2" style="width:14%; height:100%; float:left"><img src="image/2off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964647" data-long="128.620998" data-code="3" style="width:14%; height:100%; float:left"><img src="image/3off.png" style="width:50px; height:50px;" ></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:14%; height:100%; float:left"><img src="image/4off.png" style="width:50px; height:50px;"></div>
                {{--아래 소스 고쳐야함--}}
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="5" style="width:14%; height:100%; float:left"><img src="image/5off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-code='end' style="width:8%; height:100%; float:left"><img src="image/g_end_off.png" style="width:50px; height:50px;"></div>
            </div>

            <div style="width:100%; height:4% ">
                <div style="width:7%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left;">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ko_{{$data_file_name[4]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left;">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ko_{{$data_file_name[2]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left;">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ko_{{$data_file_name[0]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left;">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ko_{{$data_file_name[1]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left;">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ko_{{$data_file_name[3]['data_file_name']}}</div>
                </div>
                {{--하나 더 추가 되어야함--}}
                {{--
                <div style="width:8%; height:100%; float:left; border:1px solid #231b19;">{{$data_file_name[5]['data_file_name']}}</div>
                --}}
                <div style="width:14%; height:100%; float:left;">
                    <div style="width:70%; height:100%; float:left; border:1px solid #231b19;">ko_5th_culture.m4a</div>
                </div>

                <div style="width:9%; height:100%; float:left; border:1px solid #231b19;">ko_{{$data_file_name[5]['data_file_name']}}</div>
            </div>
            <div style="width:100%; height:5%">
                {{--나니모나이--}}
            </div>
            <div style="width:100%; ">
                <h3 style="margin-left: 8%;">区間解説</h3>
                @foreach($element_info_1 as $one)
                    @foreach($element_info_2 as $two)
                        @if($two->language_code == 1)
                            @if($one->element_detail_code == $two->element_detail_code)
                                <div class="section-audio" style='width:100%; height:10%' data-code="{{$one->element_detail_code}}" data-time='{{$two->duration}}' data-start="{{$one->section_start}}" data-end="{{$one->section_end}}">
                                    <div style="width:<?PHP print 8+14*($one->section_start)?>%; height:50%; float:left"></div>
                                    <div class="section-update" style="border : 1px solid black; width:<?PHP print 14*($one->section_end-$one->section_start) ?>%; height:50%; float:left; text-align:center; font-size:12px">
                                        ファイル名 : ko_<?PHP print $two->data_file_name ?><BR>
                                        時間 : <?PHP print $two->duration ?>秒
                                    </div>
                                    <div style="width:100%; height:50%; float:left"></div>

                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <div style="width:100%; height:1px">
                    <div style="width:8%;height:100%; float:left"></div>
                    <div style="border-top: 2px solid black; width:80%;height:100%; float:left"></div>
                </div>
            </div>
            <div style="width:100%; height:20% ; margin-top: 20px">
                <div style="width:8%;height:50%; float:left"></div>
                <h3>経路離脱音声</h3>
                <div id="course_error" style="border:1px solid black; width:15%;height:25%; float:left;text-align:center; font-size:12px">
                    ファイル名 : ko_warning.m4a
                </div>
            </div>
        </section>
        <section id="section-linemove-2" style="padding:40px; background:#f2eeee">
            <div>
                <h2 style="margin-left: 8%;margin-right: 20px ;margin-bottom:40px; display: inline-block">キョンサンガムヨン公園</h2>
                <div class="play-button" data-name="play" onclick="ppButton($(this))" style="display: inline-block; position: absolute; left:50%; top:35px; cursor:pointer;">
                    <img src="image/black-play-symbol.png" width="50px" height="50px" alt="">
                </div>
                <div class="replay-button" data-name="replay" onclick="replayButton($(this))" style="display: inline-block; position: absolute; left:55%; top:35px;cursor:pointer;">
                    <img src="image/replay.png" width="50px" height="50px" alt="">
                </div>
            </div>
            <div style="width:100%; height:55px">
                <div style="width:8%;height:100%; float:left"></div>
                <img src="image/hito.png" id="image" width="35px" height="35px" alt="" style="position: absolute; top:125px">
            </div>
            <div style="width:100%; height:1px">
                <div style="width:8%;height:100%; float:left"></div>
                <div style="border-top: 1px solid black; width:92%;height:100%; float:left"></div>
            </div>
            <div style="width:100%; height:50px">
                <div style="width:8%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left"><img src="image/g_start_off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964312" data-long="128.6215455" data-code="1" style="width:14%; height:100%; float:left"><img src="image/1off.png" style="width:50px; height:100%;"></div>

                <div class="move-place" data-lat="35.8965864" data-long="128.621251" data-code="2" style="width:14%; height:100%; float:left"><img src="image/2off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964647" data-long="128.620998" data-code="3" style="width:14%; height:100%; float:left"><img src="image/3off.png" style="width:50px; height:50px;" ></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:14%; height:100%; float:left"><img src="image/4off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:14%; height:100%; float:left"><img src="image/5off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-code='end' style="width:8%; height:100%; float:left"><img src="image/g_end_off.png" style="width:50px; height:50px;"></div>
            </div>

            <div style="width:100%; height:4% ">
                <div style="width:7.7%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">E_{{$data_file_name[4]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">E_{{$data_file_name[2]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">E_{{$data_file_name[0]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">E_{{$data_file_name[1]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">E_{{$data_file_name[3]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">E_5th_culture.m4a</div>
                </div>
                {{--하나 더 추가 되어야함--}}
                <div style="width:8.3%; height:100%; float:left; border:1px solid #231b19;">E_{{$data_file_name[5]['data_file_name']}}</div>
            </div>
            <div style="width:100%; height:5%">
                {{--나니모나이--}}
            </div>


            <div style="width:100%; ">
                <h3 style="margin-left: 8%;">区間解説</h3>
                @foreach($element_info_1 as $one)
                    @foreach($element_info_2 as $two)
                        @if($two->language_code == 2)
                            @if($one->element_detail_code == $two->element_detail_code)
                                <div class="1th" style='width:100%; height:10%' data-code="{{$one->element_detail_code}}" data-time='{{$two->duration}}' data-start="{{$one->section_start}}" data-end="{{$one->section_end}}">
                                    <div style="width:<?PHP print 8+14*($one->section_start)?>%; height:50%; float:left"></div>
                                    <div class="section-update" style="border : 1px solid black; width:<?PHP print 14*($one->section_end-$one->section_start) ?>%; height:50%; float:left; text-align:center; font-size:12px">
                                        ファイル名 : E_<?PHP print $two->data_file_name ?><br>
                                        時間 : <?PHP print $two->duration ?>秒
                                    </div>
                                    <div style="width:100%; height:50%; float:left"></div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <div style="width:100%; height:1px">
                    <div style="width:8%;height:100%; float:left"></div>
                    <div style="border-top: 2px solid black; width:80%;height:100%; float:left"></div>
                </div>
            </div>
            <div style="width:100%; height:20% ; margin-top: 20px">
                <div style="width:8%;height:50%; float:left"></div>
                <h3>経路離脱音声</h3>
                <div id="course_error" style="border:1px solid black; width:15%;height:25%; float:left;text-align:center; font-size:12px">
                    ファイル名 : E_warning.m4a
                </div>
            </div>
        </section>
        <section id="section-linemove-3" style="padding:40px; background:#f2eeee">
            <div>
                <h2 style="margin-left: 8%;margin-right: 20px ;margin-bottom:40px; display: inline-block">キョンサンガムヨン公園</h2>
                <div class="play-button" data-name="play" onclick="ppButton($(this))" style="display: inline-block; position: absolute; left:50%; top:35px; cursor:pointer;">
                    <img src="image/black-play-symbol.png" width="50px" height="50px" alt="">
                </div>
                <div class="replay-button" data-name="replay" onclick="replayButton($(this))" style="display: inline-block; position: absolute; left:55%; top:35px;cursor:pointer;">
                    <img src="image/replay.png" width="50px" height="50px" alt="">
                </div>
            </div>
            <div style="width:100%; height:55px">
                <div style="width:8%;height:100%; float:left"></div>
                <img src="image/hito.png" id="image" width="35px" height="35px" alt="" style="position: absolute; top:125px">
            </div>
            <div style="width:100%; height:1px">
                <div style="width:8%;height:100%; float:left"></div>
                <div style="border-top: 1px solid black; width:92%;height:100%; float:left"></div>
            </div>
            <div style="width:100%; height:50px">
                <div style="width:8%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left"><img src="image/g_start_off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964312" data-long="128.6215455" data-code="1" style="width:14%; height:100%; float:left"><img src="image/1off.png" style="width:50px; height:100%;"></div>

                <div class="move-place" data-lat="35.8965864" data-long="128.621251" data-code="2" style="width:14%; height:100%; float:left"><img src="image/2off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964647" data-long="128.620998" data-code="3" style="width:14%; height:100%; float:left"><img src="image/3off.png" style="width:50px; height:50px;" ></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:14%; height:100%; float:left"><img src="image/4off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:14%; height:100%; float:left"><img src="image/5off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-code='end' style="width:8%; height:100%; float:left"><img src="image/g_end_off.png" style="width:50px; height:50px;"></div>
            </div>

            <div style="width:100%; height:4% ">
                <div style="width:7.2%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ch_{{$data_file_name[4]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ch_{{$data_file_name[2]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ch_{{$data_file_name[0]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ch_{{$data_file_name[1]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ch_{{$data_file_name[3]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">ch_5th_culture.m4a</div>
                </div>
                {{--하나 더 추가 되어야함--}}
                <div style="width:8.8%; height:100%; float:left; border:1px solid #231b19;">ch_{{$data_file_name[5]['data_file_name']}}</div>
            </div>
            <div style="width:100%; height:5%">
                {{--나니모나이--}}
            </div>


            <div style="width:100%; ">
                <h3 style="margin-left: 8%;">区間解説</h3>
                @foreach($element_info_1 as $one)
                    @foreach($element_info_2 as $two)
                        @if($two->language_code == 3)
                            @if($one->element_detail_code == $two->element_detail_code)
                                <div class="1th" style='width:100%; height:10%' data-code="{{$one->element_detail_code}}" data-time='{{$two->duration}}' data-start="{{$one->section_start}}" data-end="{{$one->section_end}}">
                                    <div style="width:<?PHP print 8+14*($one->section_start)?>%; height:50%; float:left"></div>
                                    <div class="section-update" style="border : 1px solid black; width:<?PHP print 14*($one->section_end-$one->section_start) ?>%; height:50%; float:left; text-align:center; font-size:12px">
                                        ファイル名 : ch_<?PHP print $two->data_file_name ?><br>
                                        時間 : <?PHP print $two->duration ?>秒
                                    </div>
                                    <div style="width:100%; height:50%; float:left"></div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <div style="width:100%; height:1px">
                    <div style="width:8%;height:100%; float:left"></div>
                    <div style="border-top: 2px solid black; width:80%;height:100%; float:left"></div>
                </div>
            </div>
            <div style="width:100%; height:20% ; margin-top: 20px">
                <div style="width:8%;height:50%; float:left"></div>
                <h3>経路離脱音声</h3>
                <div id="course_error" style="border:1px solid black; width:15%;height:25%; float:left;text-align:center; font-size:12px">
                    ファイル名 : ch_warning.m4a
                </div>
            </div>
        </section>
        <section id="section-linemove-4" style="padding:40px; background:#f2eeee">
            <div>
                <h2 style="margin-left: 8%;margin-right: 20px ;margin-bottom:40px; display: inline-block">キョンサンガムヨン公園</h2>
                <div class="play-button" data-name="play" onclick="ppButton($(this))" style="display: inline-block; position: absolute; left:50%; top:35px; cursor:pointer;">
                    <img src="image/black-play-symbol.png" width="50px" height="50px" alt="">
                </div>
                <div class="replay-button" data-name="replay" onclick="replayButton($(this))" style="display: inline-block; position: absolute; left:55%; top:35px;cursor:pointer;">
                    <img src="image/replay.png" width="50px" height="50px" alt="">
                </div>
            </div>
            <div style="width:100%; height:55px">
                <div style="width:8%;height:100%; float:left"></div>
                <img src="image/hito.png" id="image" width="35px" height="35px" alt="" style="position: absolute; top:125px">
            </div>
            <div style="width:100%; height:1px">
                <div style="width:8%;height:100%; float:left"></div>
                <div style="border-top: 1px solid black; width:92%;height:100%; float:left"></div>
            </div>
            <div style="width:100%; height:50px">
                <div style="width:8%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left"><img src="image/g_start_off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964312" data-long="128.6215455" data-code="1" style="width:14%; height:100%; float:left"><img src="image/1off.png" style="width:50px; height:100%;"></div>

                <div class="move-place" data-lat="35.8965864" data-long="128.621251" data-code="2" style="width:14%; height:100%; float:left"><img src="image/2off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964647" data-long="128.620998" data-code="3" style="width:14%; height:100%; float:left"><img src="image/3off.png" style="width:50px; height:50px;" ></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:14%; height:100%; float:left"><img src="image/4off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-lat="35.8964154" data-long="128.6205646" data-code="4" style="width:14%; height:100%; float:left"><img src="image/5off.png" style="width:50px; height:50px;"></div>
                <div class="move-place" data-code='end' style="width:8%; height:100%; float:left"><img src="image/g_end_off.png" style="width:50px; height:50px;"></div>
            </div>

            <div style="width:100%; height:4% ">
                <div style="width:7.8%; height:100%; float:left"></div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">J_{{$data_file_name[4]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">J_{{$data_file_name[2]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">J_{{$data_file_name[0]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">J_{{$data_file_name[1]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">J_{{$data_file_name[3]['data_file_name']}}</div>
                </div>
                <div style="width:14%; height:100%; float:left">
                    <div style="width:70%; height:100%; border:1px solid #231b19;">J_5th_culture.m4a</div>
                </div>
                {{--하나 더 추가 되어야함--}}
                <div style="width:8.2%; height:100%; float:left; border:1px solid #231b19;">J_{{$data_file_name[5]['data_file_name']}}</div>
            </div>
            <div style="width:100%; height:5%">
                {{--나니모나이--}}
            </div>


            <div style="width:100%; ">
                <h3 style="margin-left: 8%;">区間解説</h3>
                @foreach($element_info_1 as $one)
                    @foreach($element_info_2 as $two)
                        @if($two->language_code == 4)
                            @if($one->element_detail_code == $two->element_detail_code)
                                <div class="1th" style='width:100%; height:10%' data-code="{{$one->element_detail_code}}" data-time='{{$two->duration}}' data-start="{{$one->section_start}}" data-end="{{$one->section_end}}">
                                    <div style="width:<?PHP print 8+14*($one->section_start)?>%; height:50%; float:left"></div>
                                    <div class="section-update" style="border : 1px solid black; width:<?PHP print 14*($one->section_end-$one->section_start) ?>%; height:50%; float:left; text-align:center; font-size:12px">
                                        ファイル名 : J_<?PHP print $two->data_file_name ?><BR>
                                        時間 : <?PHP print $two->duration ?>秒
                                    </div>
                                    <div style="width:100%; height:50%; float:left"></div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <div style="width:100%; height:1px">
                    <div style="width:8%;height:100%; float:left"></div>
                    <div style="border-top: 2px solid black; width:80%;height:100%; float:left"></div>
                </div>
            </div>
            <div style="width:100%; height:20% ; margin-top: 20px">
                <div style="width:8%;height:50%; float:left"></div>
                <h3>経路離脱音声</h3>
                <div id="course_error" style="border:1px solid black; width:15%;height:25%; float:left;text-align:center; font-size:12px">
                    ファイル名 : J_warning.m4a
                </div>
            </div>
        </section>
    </div><!-- /content -->
</div><!-- /tabs -->
</body>
</html>