var map;
var uniqueId = 1; //배열에 마커를 넣기위해 인덱스값
var ms_markers = [] // 지도에 해설포인트.마커를 넣기 위한 배열
var ms_uniqueId = 1; //배열에 해설포인트마커를 넣기위해 인덱스값
var map_illustrations = []; //일러스트 이미지 배열에 넣기
var img_src = "" ; // 지도에 이미지를 넣을 때 담는 변수
var map_latLng_event ; // 안내소 이미지를 드래그할때 일어나는 구글맵 이벤트 담는 변수
var ms_point_count = 0; // ms_지도에 찍히는 번호 담는 변수 선언 (전역)
var ms_number_list = []; // 번호담는 배열 선언(전역) [0]은 넣는 순서, [1] : 위도, [2] : 경도 , [3] : 이미지
var cultural_code ;
var element_detail_code; //음성 element_detail_code
var element_code; // 특정 엘리멘트 코드 담는 변수
var maxValue; // element 修整 위한 max값
var element_facility_code ; // delete하기위한 element값받는 변수
var cultural_name;
var priority ;
var explantion = [] ; //성현 해설포인트 담는 변수
var explantionMarker = [] ; //성현 해설포인트 담는 변수
var explanInfowinow = [];
var facilityMarker = [] ;
var language_code = 1;
var audio_file ;
$(document).ready(function(){

    //지도 불러오기
    map = new google.maps.Map(document.getElementById("menu_content_map"),{
        center : {lat: 35.790126, lng: 129.331936},
        zoom: 19,
    })

    // 음성파일이 등록되었을 때 실행.
    if($("#ex_cultural_code").val()){
        //탭 전환
        $(".nav_check").removeClass("active").css("color","#4B4B4B");
        $(".nav_check").css("border-bottom","#BDBDBD 1px solid");

        $(".nav_check:nth-child(3)").addClass("active").css("color","#4B4B4B");
        $(".nav_check:nth-child(3)").css("border-bottom","#4B4B4B 3px solid");
        $(".nav_content").hide();
        var activeTab = $(".nav_check:nth-child(3)").attr("rel");
        $("#" + activeTab).show();

        explantion = [] ;

        cultural_code = $("#ex_cultural_code").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : 'explaintionPriority' ,
            type : 'POST',
            data : {
                cultural_code : cultural_code
            },
            success : function(data){
                console.log("data : " +data);
                if(data.length){
                    for(var i=0 ; i<data.length ; i++){
                        console.log(data[i].element_detail_code);
                        explantion[i] = new Array(3) ;
                        explantion[i][0] = data[i].element_detail_code;
                        explantion[i][1] = data[i].latitude;
                        explantion[i][2] = data[i].longitude;
                        console.log(data[i].cultural_name);
                        geocoding(data[i].cultural_address, ex_cultural_code);

                        cultural_name = data[i].cultural_name;
                        console.log("cucddd : " + cultural_name);
                        var image = {
                            url: "image/explantion.png",
                            scaledSize: new google.maps.Size(40, 40),
                            labelOrigin: new google.maps.Point(20, 17)
                        };
                        var marker = new google.maps.Marker({
                            position: {lat: data[i].latitude, lng: data[i].longitude},
                            map: map,
                            label:{
                                color :'black',
                                fontWeight : 'bold',
                                fontSize : "18px",
                                text : i+1+""
                            },
                            icon : image
                        });
                        marker.code = explantion[i][0];
                        google.maps.event.addListener(marker,"click",function(){
                            console.log("click : " + this.code);
                            $(".detail-file-code").attr("value",this.code);
                            var modal = UIkit.modal("#modal-explanation");
                            if(modal.show()){
                                explantionVoice(this.code);
                            }

                        });

                    }
                    //안내 시작멘트 나오게 하기
                    console.log("cultural_name : " + cultural_name);
                    startGuide(cultural_name);
                }
            },
            error : function(){
                alert("실패");
            }
        })

    }else{
        // nav content 내용 바꾸기
        $(".nav_content:first").show();
        $(".nav_check:first").css("border-bottom","#4B4B4B 3px solid");
    }


    //위도, 경도 값 불러오기
    google.maps.event.addListener(map, 'click', function(mouseEvent){
        console.log("mouser  LL : "  + mouseEvent.latLng);
    })


    $(".nav_check").click(function(){
        $(".nav_check").removeClass("active").css("color","#4B4B4B");
        $(".nav_check").css("border-bottom","#BDBDBD 1px solid");

        $(this).addClass("active").css("color","#4B4B4B");
        $(this).css("border-bottom","#4B4B4B 3px solid");
        $(".nav_content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).show();
    });

    //nav content 마다 색깔 바꾸기
    $(".map_upload_button").on("mouseover", function(){
        $(this).css("background", "#119208");
        $(this).css("color", "white");
    });

    $(".map_upload_button").on("mouseout", function(){
        $(this).css("background", "#fdfdfd");
        $(this).css("color", "#999");
    });

    $(".culture_language_plus").click(function(){
        var minus = $(this).next();
        console.log(minus);
        var explanation = $(this).parent().prev();

        var text = "<div class='culture_explanation_language'>"

                        + "<select class='language_select'>"
                        + "<option value='korean' selected>韓国語</option>"
                        + "<option value='english'>英語</option>"
                        + "<option value='chinese'>中国語</option>"
                        + "<option value='japanese'>日本語</option>"
                        + "</select>"
                        + "<div class='culture_name'>"
                            + "<div>文化財の名前</div>"
                            + "<input type='text'>"
                        + "</div>"
                        + "<div class='culture_detail'>"
                            + "<div>文化財の説明</div>"
                            + "<textarea name='' id='' cols='83' rows='5'></textarea>"
                        +"</div>"
                    +"</div>";

        explanation.append(text);

        if($(this).parent().prev().children().length == 2){
            minus.css("display","inline-block");
        }

    })

    $(".add-plus-minus").on("click",".culture_language_minus",function(){
        var explanation = $(this).parent().prev();
        var minus = $(this).next();
        explanation.children().last().remove();
        if($(this).parent().prev().children().length == 1 ){
            $(this).css("display","none");
        }
    })


    $(".culture_explanation").on('change','.language_select',function(){
        var language = $(this).val();
        $(this).next().children("input").attr('name',language+"_name");
        $(this).next().next().children("textarea").attr('name',language+"_text");
    });
    //문화재 등록에서 이미지 파일 선택할 때 실행
    $(".img_upload_file").change(function(){
        readURL(this, $(this).attr("data-code"));
    })

    var language =[];
    var culture_ex =[];
    //등록된 문화재 보기 위해서
    $(".detail_button").click(function(){
        var cultural_code = $(this).attr("data-code");
        $("#modal-one-show .culture_explanation").empty();
        console.log(cultural_code);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : 'oneTypeCulturalShow' ,
            type : 'POST',
            async: false,
            data : {
                cultural_code : cultural_code
            },
            dataType: 'json',
            success : function(data){
                if(data.length) {

                    var text = "";
                    for (var i = 0; i < data.length; i++) {
                        if( data[i].language == "japanese") {
                            $("#modal-one-show .one_cultural_name").text(data[i].cultural_name);
                        }
                        text += "<div class='culture_explanation_language'>"
                            + "<input type='hidden' name='data-detail-code-" + i + "' value=" + data[i].cultural_detail_code + ">"
                            + "<div class='culture_language'>"
                            + "<div>言語 : </div>"
                            + "<div data-code=''>" + data[i].language + "</div>"
                            + "</div>"
                            + "<div class='culture_name'>"
                            + "<div>文化財の名前</div>"
                            + "<div>" + data[i].cultural_name + "</div>"
                            + "</div>"
                            + "<div class='culture_detail'>"
                            + "<div>文化財の説明</div>"
                            + "<div>" + data[i].cultural_detail_explain + "</div>"
                            + "</div>"
                            + "</div>";
                    }
                    $("#modal-one-show .culture_explanation").append(text);

                    culture_ex[0] = data[0].cultural_name;
                    if (data[0].cultural_image) {
                        var upload = 'uploads/' + data[0].cultural_image;
                        $("#modal-one-show .culture_image").attr("src", upload);
                    } else {
                        $("#modal-one-show .culture_image").attr("src", "image/no-image.png");
                        culture_ex[1] = data[0].cultural_name;
                    }
                    $("#modal-one-show .culture_address > div:nth-child(2)").text(data[0].cultural_address);
                    culture_ex[2] = data[0].cultural_address;
                }

            },
            error : function(){
                console.log("실패");
            }
        })
    });

    //修整 버튼 눌렀을 때
    // $(".one-cultural-update").click(function(){
    //     var text = "<div class='culture_explanation_language'>"
    //                 +"<input type='hidden' name='data-detail-code-"+i+"' value="+data[0].cultural_detail_code+">"
    //                     +"<select class='language_select'>"
    //                         +"<option value='korean' selected>한국어</option>"
    //                         +"<option value='english'>영어</option>"
    //                         +"<option value='chinese'>중국어</option>"
    //                         +"<option value='japanese'>일본어</option>"
    //                     +"</select>"
    //                 + "<div class='culture_name'>"
    //                     +"<div>문화재명</div>"
    //                     +"<div>"+ data[0].cultural_name +"</div>"
    //                 +"</div>"
    //                 + "<div class='culture_detail'>"
    //                     +"<div>문화재 설명</div>"
    //                     +"<div>"+ data[0].cultural_detail_explain +"</div>"
    //                 +"</div>"
    //             + "</div>" ;
    // });

    //2차 타입 문화재 등록
    $(".two-type-culture").on("click",function(){
       var name = $(this).prev().prev().text();
       name = name + " 文化財登録";
       $("#modal-two-register h2").text(name);
       var culture_code = ($(this).attr("data-code")) ;
       $(".culture_code").attr("value",culture_code );
    });

    //2차 타입 문화재 보기
    $(".two-detail-button").on('click', function(){

        var cultural_code = $(this).attr("data-code");
        var cultural_include = $(this).attr("data-include");
        $("#modal-two-show .culture_explanation").empty();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : 'twoTypeCulturalShow',
            type : 'POST',
            async: false,
            data : {
                cultural_code : cultural_code,
                cultural_include : cultural_include
            },
            success : function(data){
                if(data.length){
                    var text = "";
                    for (var i = 0; i < data.length; i++) {
                        if(data[i].language == "japanese"){
                            $(".two_cultural_name").text(data[i].cultural_name);
                        }
                        console.log("dddd");

                        text += "<div class='culture_explanation_language'>"
                            + "<input type='hidden' name='data-detail-code-" + i + "' value=" + data[i].cultural_detail_code + ">"
                            + "<div class='culture_language'>"
                            + "<div>言語 : </div>"
                            + "<div data-code=''>" + data[i].language + "</div>"
                            + "</div>"
                            + "<div class='culture_name'>"
                            + "<div>文化財の名前</div>"
                            + "<div>" + data[i].cultural_name + "</div>"
                            + "</div>"
                            + "<div class='culture_detail'>"
                            + "<div>文化財の説明</div>"
                            + "<div>" + data[i].cultural_detail_explain + "</div>"
                            + "</div>"
                            + "</div>";
                    }
                    $("#modal-two-show .culture_explanation").append(text);
                }
            },
            error : function(){
                console.log("실패");
            }
        })
    });


    //지도에 문화재 이미지 입힐 때
    // 안내 이미지
    $(".drag_image").draggable({

        accept : ".drag_image",
        helper : "clone",
        drag : function (event, ui) {
            element_code = $(this).attr("data-code");
            img_src = $(this).attr("src");

        },
        cursor : "pointer"


    })


    //일러스트 이미지

    $(".upload_img_wrap").on("mouseover",".drag_image",function(){
        $(".drag_image").draggable({
            accept : ".drag_image",
            helper : "clone",
            drag : function (event, ui) {
                img_src = $(this).attr("src");
                console.log("ili img_src : " + img_src);

            },
            cursor : "pointer",
        })
    })

    //해설 포인트
    $(".priority").draggable({
        helper : "clone",
        drag : function (event, ui) {
            priority = $(this).attr('src');
        },
        cursor : "pointer"
    })

    // drag 하는 곳
    $("#menu_content_map").droppable({
        accept : ".drag_image",
        greedy: true,
        drop : function(event,ui){
            if(img_src != ""){
                map_latLng_event = google.maps.event.addListener(map, 'mouseover', function (mouseEvent) {
                    mapPositionImage(mouseEvent.latLng,img_src);
                })
            }else{
                e_map_latLng_event = google.maps.event.addListener(map, 'mouseover', function (mouseEvent) {
                    explanation_point(mouseEvent.latLng,priority);
                })
            }

            console.log("img srcs tyipe " + img_src);

        }
    })

    //안내시작, 안내종료, 구간해설
    $(".start_content").hide();
    $(".start_content:first").show();
    $("ul.startNav li").click(function(){

        $("ul.startNav li").removeClass("active").css("color", "#333");
        $(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css("color", "darkred");
        $(".start_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();

        language_code = activeTab.substr(8, 8);
        console.log(language_code);

    })

    $(".end_content").hide();
    $(".end_content:first").show();
    $("ul.endNav li").click(function(){
        $("ul.endNav li").removeClass("active").css("color", "#333");
        $(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css("color", "darkred");
        $(".end_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();

        language_code = activeTab.substr(6, 6);
        console.log(language_code);

    })

    $(".section_content").hide();
    $(".section_content:first").show();
    $("ul.sectionNav li").click(function(){
        $("ul.sectionNav li").removeClass("active").css("color", "#333");
        $(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css("color", "darkred");
        $(".section_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();

        language_code = activeTab.substr(6, 6);
        console.log(language_code);

    })

    $(".audio_register").on("change",function(){
        console.log("sect>? ") ;
        audio_file = [] ;
        audio_file = this.files;
        console.log("audio : " + audio_file);
        var sound = $(this).next().next();
        sound.attr("src", URL.createObjectURL(this.files[0]));
        sound.onend = function (e) {
            URL.revokeObjectURL(this.src);
        }
    });


    //일러스트 이미지 - 파일업로드 클릭했을때
    $("#input_img").on("change",handleImgFileSelect);

    //음성파일 - 파일 업로드 클릭시
    $(".audio_contents").on("change",".audio_register",function(){
        var sound = $(this).next();
        sound.attr("src",URL.createObjectURL(this.files[0])) ;
        sound.onend = function(e){
            URL.revokeObjectURL(this.src);
        }
        console.log("element_detail_code : "+ element_detail_code);
        var language = $(this).prev().prev().val();
        var file = this.files;
        console.log("audio : "+ file);
        console.log("audio L : " + file[0]);
        console.log("audio Laaa : " + language);
        var form = new FormData();
        form.append(language, file[0]);
        form.append("element_detail_code",element_detail_code);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "audioAjaxUpload",
            type: "POST",
            processData: false,
            contentType: false,
            data: form,

            success: function (data) {
                alert("音声のアップロードの完了");
            },
            error: function () {
                alert("fail");
            }
        });


    });


    // 음성파일 - 구간 종료 처음
    // $("#tab3").on("change",".audio_register",function() {
    //     var file = this.files;
    //     var language ;
    //     console.log($(this).prev().val());
    //     var form = new FormData();
    //     form.append('language', file[0]);
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: "audioAjaxUpload",
    //         type: "POST",
    //         processData: false,
    //         contentType: false,
    //         data: form,
    //         success: function (data) {
    //             console.log("음성 업로드 완료 :" +data);
    //         },
    //         error: function () {
    //             alert("fail");
    //         }
    //     });
    //
    //     var sound = $(this).next();
    //     sound.attr("src",URL.createObjectURL(this.files[0])) ;
    //     sound.onend = function(e){
    //         URL.revokeObjectURL(this.src);
    //     }
    // });


})

//해설을 등록하고 보이는 부분
function explantionVoice(code){

    console.log("modal : " + "open" + code);
    element_detail_code = code;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "audioSelect",
        type : "POST",
        async: false,
        data : {
            element_detail_code : element_detail_code
        },
        success : function (data) {
            console.log("modal : " + "open" + code);
            if(data.length) {
                console.log("modal : " + "open" + code);
                $(".audio_content_display").css("display","none");
                $(".audio_reg_show").empty();
                $(".audio_reg_show").css("display","block");
                $(".audio_reg_show_footer").css("display","block");

                console.log(data);
                console.log("data :" + data[0].element_detail_code);
                console.log("data :" + data[0].data_file_name);
                console.log("data :" + data[0].language);
                console.log("data :" + data[0].data_file_code);
                var text ="";
                for(var i=0; i<data.length;i++) {
                    text  += "<div class='audio_file'>"
                            +"<span style='display: inline-block; position: absolute; top:30px' >" + data[i].language + "音声ファイル</span>"
                            +"<audio src='audio/" + data[i].data_file_name + "' controls ></audio>"
                            +"<div class='audio-end-point'>"
                                +"<span>修了ポイント</span>"
                                +"<span style='margin-left: 60px;'>10秒</span>"
                                +"<span>20秒</span>"
                            +"</div> "
                        + "</div>"
                }
                $(".audio_reg_show").append(text);
                $(".audio_reg_show_footer").css("display","block");


            }else{
                $(".audio_content_display").css("display","block");
                $(".audio_reg_show").css("display","none");
                $(".audio_reg_show_footer").css("display","none");
            }
        },
        error : function (){
            alert("fail");
        }
    });

}

// 해설
function explanation_point(position,priority){
    var result;
    result = position + "" ;

    result = result.replace(/\)/g,"");
    result = result.replace(/\(/ig,"");
    result = result.split(",") ;
    var element_detail_code = "";
    var i = explantion.length;
    console.log(explantion.length);
    console.log("e_position : " + position + "priority : "+priority);

    explantion[i] = new Array(3);
    explantion[i][1] = Number(result[0]);
    explantion[i][2] = Number(result[1]);

    for(var j=0 ; j<explantion.length; j++){
        console.log("ex : "+explantion[i][1]);
        console.log("ex : "+explantion[i][2]);
    }

    var image = {
        url: priority,
        scaledSize: new google.maps.Size(40, 40),
        labelOrigin: new google.maps.Point(20, 17)
    };
    var marker = new google.maps.Marker({
        position: {lat: Number(result[0]), lng: Number(result[1])},
        map: map,
        label:{
            color :'black',
            fontWeight : 'bold',
            fontSize : "18px",
            text : i+1+""
        },
        icon : image
    });
    // 해설 포인트 등록
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "culturalExplanation",
        type : "POST",
        async: false,
        data : {
            cultural_code : cultural_code ,
            priority : i+1 ,
            latitude : explantion[i][1],
            longitude : explantion[i][2],
            element_code : 5
        },
        success : function (data) {
            element_detail_code = data[0].element_detail_code;
            console.log("elem 1  : " + data[0].element_detail_code);
            console.log("elem 2  : " + element_detail_code);
        },
        error : function (){
            alert("fail");
        }
    })
    console.log("elem 3  : " + element_detail_code);
    explantion[i][0] = element_detail_code ;
    marker.code = explantion[i][0];
    google.maps.event.addListener(marker,"click",function(){
        element_detail_code = this.code;
        console.log("click : " + element_detail_code);
        $(".audio_file input[type=file]").val("");
        $(".audio_file audio").attr("src","");
        var modal = UIkit.modal("#modal-explanation");
        if(modal.show()){
            explantionVoice(this.code);
        }

    });

    explantionMarker.push(marker);
    google.maps.event.removeListener(e_map_latLng_event);
}

function explanationDeleteMarker(){
    console.log("pri : "+ size + "  code : "+ code);
    if(explantionMarker != null){
        for(var i=0 ; i< explantionMarker.length ; i++){
            explantionMarker[i].setMap(null);
        }
    }
    explantion.splice(size,1) // explantion 削除

    console.log(explantion.length);

    console.log(explantion);
    for(var i=0 ; i<explantion.length ; i++)
        console.log(explantion[i][0]);
    //console.log(explantion[size][0]); delete
    //php배열 값 넣어야함
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "explainDelete",
        type : "post",
        data: {
            element_detail_code : code,
            explantion : explantion
        },
        success : function(data){
            if(data.length) {
                marker_show();
            }
        },
        error : function(){

        }
    })

}

function marker_show(){

    console.log(explantion);
    explantionMarker = [];
    explanInfowinow = [];

    for(var i=0 ; i<explantion.length; i++){
        var image = {
            url: "image/explantion.png",
            scaledSize: new google.maps.Size(40, 40),
            labelOrigin: new google.maps.Point(20, 17)
        };
        var marker = new google.maps.Marker({
            position: {lat: explantion[i][1], lng: explantion[i][2]},
            map: map,
            label:{
                color :'black',
                fontWeight : 'bold',
                fontSize : "18px",
                text : i+1+""
            },
            icon : image
        });

        // marker.infowindow = new google.maps.InfoWindow({
        //     content : "<div href='#modal-explanation' uk-toggle></div>"
        // });

        explantionMarker.push(marker);
        marker.code = explantion[i][0];
        google.maps.event.addListener(marker,"click",function(){
            console.log("click : " + this.code);
            $(".detail-file-code").attr("value",this.code);
            var modal = UIkit.modal("#modal-explanation");
            if(modal.show()){
                explantionVoice(this.code);
            }

        });
        // google.maps.event.addListener(marker, 'click', function(){
        //     this.infowindow.open(map,this);
        // });
    }
}

function audioFileSelect(e){
    var sound = $(this).next();
    console.log(sound);
    console.log(this.files[0]);
    sound.attr("src",URL.createObjectURL(this.files[0])) ;
    sound.onend = function(e){
        URL.revokeObjectURL(this.src);
    }
}
function ms_number(count){
    var number = count+1;
    var image = document.getElementById('ms_img');

    image.src="/image/number_"+number+".png";
}
//구글 위도, 경도 알아내는 이벤트 발생할 때 위도 경도값에 마커띄워줌
function mapPositionImage(position,img_src){

    var result;
    result = position + "" ;
    console.log("position5 : " + result + "img_src : " + img_src);

    if(img_src != "") {
        result = result.replace(/\)/g, "");
        result = result.replace(/\(/ig, "");
        result = result.split(",");
        console.log("position2 : " + img_src.substr(0, 9));


        // ms_해설 이미지 등록 할때
        var ms_img_src = img_src;
        var ms_location = [];
        if (ms_img_src.substr(0, 13) == "/image/number") {

            ms_location.push(ms_point_count);
            ms_location.push(result[0]);
            ms_location.push(result[1]);
            ms_location.push(img_src);
            ms_number_list.push(ms_location);

            ms_point_count++; //ms_지도 한번찍을때마다 번호+1
            //ms_포인트리스트에 동적으로 html 소스 추가
            var html = "<li data-code=list_" + ms_point_count + ">" +
                ms_point_count + "<BR>" +
                result[0] + "<BR>" + result[1] + "</li>";

            $("#ms_point_list").append(html);

            /*
            //ms_해설포인트 지도에 등록시 db에 추가하기 임시로 막아둔거임
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "guide_point_add",
                type : "POST",
                data : {
                    guide_point_code : ms_point_count, //해설코드번호
                    first_cultural_code : 1, // 문화재 주소
                    turn : ms_point_count, // 해설순번
                    latitude:result[0], // 위도
                    longitude:result[1], //경도
                    radius:6//반경
                },
                success : function (data) {
                    alert(data);
                },
                error : function (){
                    alert("fail");
                }
            })
            */
            /*
            //ms_cultural_model call 해설포인트 등록 마다 db에 값추가
            $('#ms_php_code').append("<script type = 'text/javascript'> location.href='/guide_point_add'; </script>");
*/

            ms_number(ms_point_count);

            //var ms_count = 0;
            $temp = [];
            //ms_배열의 값과 li 순서를 동일하게 해주는 소스
            $("#ms_point_list>li").each(function (index) {
                $list_count = index;
                $temp.push(($(this).text()).substr(0, 1));
            });

            /*지도 위 해설포인트 削除하는 소스*/
        }

        { // list 순서와 배열순서 같게해줌
        var temp0 = [];
        for (var i = 0; i < ms_number_list.length; i++) {
            var temparray = [];
            temparray.push(ms_number_list[$temp[i] - 1][0]);
            temparray.push(ms_number_list[$temp[i] - 1][1]);
            temparray.push(ms_number_list[$temp[i] - 1][2]);
            //temparray.push(ms_number_list[$temp[i]-1][3]);
            temp0.push(temparray);
        }
        for (var i = 0; i < ms_number_list.length; i++) {
            ms_number_list[i][0] = temp0[i][0];
            ms_number_list[i][1] = temp0[i][1];
            ms_number_list[i][2] = temp0[i][2];
            //ms_number_list[i][3] = temp0[i][3];
        }
    }

        //일러스트이미지 등록할때
        if(img_src.substr(0,10) == 'data:image'){
            var image = {
                url: img_src,
                //size: new google.maps.Size(500, 500),
                //origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(0, 0),
            };
        }
        //해설 이미지라면
        else if (img_src.substr(0,13) == "/image/number"){
            var image = {
                url: img_src,
                //size: new google.maps.Size(500, 500),
                //origin: new google.maps.Point(0,0),
                //anchor: new google.maps.Point(200, 210),
                scaledSize: new google.maps.Size(20, 20)
            };
        }
        else { //
            var image = {
                url: img_src,
                //size: new google.maps.Size(500, 500),
                //origin: new google.maps.Point(0,0),
                //anchor: new google.maps.Point(200, 210),
                scaledSize: new google.maps.Size(40, 40)
            };
        }

        // /image/number == 해설이미지라면 따로 배열에 담음
        if(img_src.substr(0,13) == "/image/number"){
            var ms_marker = new google.maps.Marker({
                position : {lat : Number(result[0]), lng: Number(result[1])},
                map: map,
                icon: image
            });
            //Set unique id
            ms_marker.id = ms_uniqueId;
            ms_uniqueId++;

            //ms_마커 클릭했을 때, infowindow창 나타남
            var infowindow = new google.maps.InfoWindow({
                content: 'Latitude: ' + Number(result[0]) + '<br />Longitude: ' + Number(result[1])
                + "<br/><input type = 'button' value = 'Delete' onclick = 'DeleteMarker(" + ms_marker.id + ");' value = 'Delete' />"
            });
            ms_marker.addListener('click', function() {
                    infowindow.open(map, ms_marker);
                console.log("위 : " + result[0] + "경 : " + result[1]);
            });
            ms_markers.push(ms_marker);
            this.img_src = "";
            google.maps.event.removeListener(map_latLng_event);
        }
        else {

            console.log(element_facility_code);
            var marker = new google.maps.Marker({
                position: {lat: Number(result[0]), lng: Number(result[1])},
                map: map,
                icon: image
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "add_element",
                type : "POST",
                async: false,
                data : {
                    cultural_code : cultural_code,
                    element_code : element_code,
                    latitude : Number(result[0]),
                    longitude : Number(result[1])
                },
                success : function (data) {
                    console.log(data[0].element_detail_code);
                    element_facility_code = data[0].element_detail_code;
                    console.log(element_facility_code);

                },
                error : function (){
                    alert("fail");
                }
            })
            console.log(element_facility_code);
            //Set unique id
            marker.code = element_facility_code;
            uniqueId++;

            //마커 클릭했을 때, infowindow창 나타남
            // marker.infowindow = new google.maps.InfoWindow({
            //     content: "<div style='width:200px; height: 25px'><button onclick='QRCreate($(this),maxValue);' style='position:absolute; top: 0; left:0'>qr코드 생성</button>"
            //     + "<button onclick = 'DeleteMarker(" + marker.id + ");'  style='position:absolute; top: 0; left:100px'>Delete</button>"
            //     + "</div><img src=''>"
            // })
            console.log("marker+_code :"+ element_facility_code);
            if(img_src.substr(7,2) == "qr") { // qr이면 버튼 생성
                marker.infowindow = new google.maps.InfoWindow({
                    content: "<div style='width:200px; height: 25px'><button onclick='QRCreate($(this),element_facility_code);' class='qr-create'  style='position:absolute; top: 0; left:0'>QRコード生成</button>"
                    + "<button onclick = 'DeleteMarker(" + marker.code + ");' class='infowindow-delete'  style='position:absolute; top: 0; left:110px'>Delete</button>"
                    + "</div><img src=''>"

                });
            }else if(img_src.substr(7,2) == "ar"){
                marker.infowindow = new google.maps.InfoWindow({
                    content: "<div>"
                                +"<label for='ar-image'>"
                                    +"<img src='/image/fileSelect.png'>"
                                +"</label>"
                                +"<input type='file' id='ar-image' onchange='ARUpdate(this.files,"+marker.code+")'>"
                            +"</div>"
                            + "<div>"
                                + "<button onclick = 'DeleteMarker(" + marker.code + ");' class='infowindow-delete'>Delete</button>"
                            + "</div>"

                });
            }else{
                marker.infowindow = new google.maps.InfoWindow({
                    content:"<div style='width: 70px; height: 30px'><button onclick = 'DeleteMarker(" + marker.code + ");' class='infowindow-delete'  style='position:absolute; top: 0;'>Delete</button></div>",
                    maxWidth : 500
                });
            }

            google.maps.event.addListener(marker, 'click', function(){
                this.infowindow.open(map,this);
            });
            facilityMarker.push(marker);
            //img_src 秒기화해서 또 지도에 추가되는 걸 막음
            this.img_src = "";
            console.log("img_srceeee3333 : " + this.img_src);
            google.maps.event.removeListener(map_latLng_event);
        }
    }
}

function ARUpdate(file,element_detail_code){
    console.log(file[0].name);
    console.log(file.name);
    var form = new FormData();
    console.log("file[0] : " + file[0])
    form.append("ar",file[0]);
    form.append("element_detail_code",element_detail_code);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        url : "ARUpdate",
        type : "POST",
        data : form,
        success : function (data) {
            alert("ar 파일 등록");
            console.log("insert :"+ data);
            $("#ar-image").after("<div style='margin: 10px'>"+file[0].name+"</div>");
        },
        error : function (){
            alert("deleteFail"+" "+ id);
        }
    });
}

// 마커 削除 함수
function DeleteMarker(code) {
    console.log("marker.code : "+ code);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "del_element",
        type : "POST",
        data : {
             element_detail_code : code
        },
        success : function (data) {
            console.log("delSuceess :"+ data);
        },
        error : function (){
            alert("deleteFail"+" "+ id);
        }
    });


    //Find and remove the marker from the Array
    for (var i = 0; i < facilityMarker.length; i++) {
        if (facilityMarker[i].code == code) {
            //Remove the marker from Map
            facilityMarker[i].setMap(null);

            //Remove the marker from array.
            facilityMarker.splice(i, 1);
            return;
        }
    }

};


function fileUploadAction(){
    console.log("fileUploadAction");
    $("#input_img").trigger('click');
}

// 이미지 웹상에서 띄우기
function handleImgFileSelect(e){
    //이미지 정보 秒기화
    var upload_img_wrap_length =  $(".selProductFile").length ;
    console.log("index : " + upload_img_wrap_length) ;
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);

    console.log("fileArray : " + filesArr);

    var index = 0 ;

    if(upload_img_wrap_length > 0){
        index += upload_img_wrap_length;
        console.log("index : " + index) ;
    }

    filesArr.forEach(function (f) {
        console.log( " e : " +  e);
        if(!f.type.match("image.*")){
            console.log("확장자는 이미지 확장자만 가능합니다.");
            return;
        }

        map_illustrations.push(f);

        var reader = new FileReader();
        reader.onload = function(e){

            var html = '<div class="illustration_img_each" id=img_'+index+'>'
                + '<img src="'+e.target.result+'" data-file="'+f.name+'" class="selProductFile drag_image">'
                + '<div uk-icon="close"  onclick="deleteImageAction('+index+')"></div>'
                +'</div>'
            $(".upload_img_wrap").append(html) ;
            index++;
        }
        reader.readAsDataURL(f) ;
    })
}

// 일러스트 이미지 削除
function deleteImageAction(index) {
    console.log("index : " + index);
    map_illustrations.splice(index, 1);

    var img_id = "#img_" + index;
    $(img_id).remove();
    console.log(map_illustrations);
}


// 문화재 등록할 때, 이미지 프리뷰
function readURL(input,position) {
    var select ;

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $("#culture_common input[type='file']").each(function(){
            if(position == $(this).attr("data-code")){
                select = $(this);
                console.log(select);
            }
            console.log(position + "data : " + $(this).attr("data-code"));
        })
        reader.onload = function(e) {
            select.next().attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// 주소를 좌표에 찍기
var geocoder ;

function geocoding(address, cultural_code,cultural_name){
    this.cultural_code  = cultural_code ;
    this.cultural_name = cultural_name;
    console.log("ddd");
    culturalElementSelect();
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
        } else {
            console.log('Geocode was not successful for the following reason: ' + status);
        }
    });
}

//문화재를 클릭하면 해당 문화재의 편의시설, 해설 포인트 모두 나옴
function culturalElementSelect(){
    console.log("cultural_ : "+cultural_code );

    if(explantion.length > 0 && facilityMarker.length > 0){
        explantion = [] ;
        for (var i = 0; i < explantionMarker.length; i++) {
            explantionMarker[i].setMap(null);
        }
        for (var i = 0; i < facilityMarker.length; i++) {
            facilityMarker[i].setMap(null);
        }
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "culturalElementAllSelect",
        type : "POST",
        data : {
            cultural_code : cultural_code
        },
        success : function (data) {
            startGuide();
            if(data.length) {
                console.log("cultural_name" + cultural_name);
                var count =0 ; //해설 포인트

                for (var i = 0; i < data.length; i++) {
                    console.log("code :" + data[0].cultural_code);
                    console.log("dd : "+ data[i].element_detail_code);
                    console.log("element_priority : " + data[i].element_priority);
                    console.log("ee :"+maxValue);
                    var element_code = data[i].element_code ;
                    var element_image ;
                    var priority = data[i].element_priority;
                    console.log("ddddd : "+ priority);
                    // 해당 엘리먼트 코드이면 image 파일을 넣으면
                    if(element_code == 1 ){
                        element_image = "image/restroom.png";
                    }else if(element_code == 2){
                        element_image = "image/qricon.png";
                    }else if(element_code == 3){
                        element_image = "image/aricon.png";
                    }else if(element_code == 4){
                        element_image = "image/information.png";
                    }else if(element_code == 5){
                        explantion[priority] = new Array(3) ;
                        explantion[priority][0] = data[i].element_detail_code;
                        explantion[priority][1] = data[i].latitude;
                        explantion[priority][2] = data[i].longitude;
                    }else if(element_code == 6){
                        var tab = $("#startTab"+data[i].language_code) ;
                        tab.empty();

                        var content = "<button class='audio-ment-update'>修整</button><button class='audio-ment-delete'>削除</button>"
                                     +"<audio src='audio/"+data[i].data_file_name+"' controls style='margin-top: 30px'></audio>"

                        tab.append(content);
                        // $("#startTab"+data[i].language_code+" > audio").attr("src","audio/"+data[i].data_file_name);
                    }else if(element_code == 9){

                        var tab = $("#endTab"+data[i].language_code) ;
                        tab.empty();
                        var content = "<button class='audio-ment-update'>修整</button><button class='audio-ment-delete'>削除</button>"
                                     +"<audio src='audio/"+data[i].data_file_name+"' controls style='margin-top: 30px'></audio>"
                        tab.append(content);

                    }else if(element_code == 8){
                        console.log("dddd" + data[i].data_file_name);

                        var tab = $("#secTab"+data[i].language_code) ;
                        tab.empty();
                        var content = "<button class='audio-ment-update'>修整</button><button class='audio-ment-delete'>削除</button>"
                                    +"<audio src='audio/"+data[i].data_file_name+"' controls style='margin-top: 30px'></audio>"
                                    +"<div class='section-end-point'>"
                                        +"<span>修了ポイント</span>"
                                        +"<span style='margin-left: 30px'>15秒</span>"
                                        +"<span>25秒</span>"
                                    +"</div>"
                        tab.append(content);
                    }
                    if(element_code != 5){
                        var marker = new google.maps.Marker({
                            position: {lat: data[i].latitude, lng: data[i].longitude},
                            map: map,
                            icon: element_image
                        });
                        //element_detail_code = maxValue 값
                        maxValue = data[i].element_detail_code;
                        marker.code = data[i].element_detail_code;

                        if(element_code == 2){
                            console.log("dddddimage : "+ maxValue);
                            if(data[i].element_detail_file == null){
                                data[i].element_detail_file = "";
                            }
                            console.log("ccc");
                            marker.infowindow = new google.maps.InfoWindow({
                                content: "<div style='width:200px; height: 25px'><button onclick='QRCreate($(this),maxValue);' class='qr-create' style='position:absolute; top: 0; left:0'>QRコード生成</button>"
                                        + "<button onclick = 'DeleteMarker(" + marker.code + ");' class='infowindow-delete' style='position:absolute; top: 0; left:110px'>Delete</button>"
                                        + "</div><img src='"+data[i].element_detail_file+"'>"
                            })
                            console.log("aaa");
                        }else if(element_code == 3){

                            if(data[i].element_detail_file == null){
                                marker.infowindow = new google.maps.InfoWindow({
                                    content: "<div>"
                                    +"<label for='ar-image'>"
                                    +"<img src='/image/fileSelect.png'>"
                                    +"</label>"
                                    +"<input type='file' id='ar-image' onchange='ARUpdate(this.files,"+marker.code+")'>"
                                    +"</div>"
                                    + "<div>"
                                    + "<button onclick = 'DeleteMarker(" + marker.code + ");' class='infowindow-delete'>Delete</button>"
                                    + "</div>"

                                });
                            }else {
                                marker.infowindow = new google.maps.InfoWindow({
                                    content: "<div style='margin: 10px'>" + data[i].element_detail_file + "</div>"
                                    + "<div>"
                                    + "<button onclick = 'DeleteMarker(" + marker.code + ");' class='infowindow-delete'>Delete</button>"
                                    + "</div>"
                                })
                            }
                        }else{
                            marker.infowindow = new google.maps.InfoWindow({
                                content:"<div style='width: 70px; height: 30px'><button onclick = 'DeleteMarker(" + marker.code + ");' class='infowindow-delete'  style='position:absolute; top: 0;'>Delete</button></div>"
                            })
                            console.log("aaac");
                        }
                        google.maps.event.addListener(marker, 'click', function(){
                            this.infowindow.open(map,this);
                        });

                        facilityMarker.push(marker);
                    }

                }
                // 배열의 공백 제거
                explantion.splice(0,1);
                for(var i=0 ; i<explantion.length ; i++){
                    console.log(explantion);
                        var image = {
                            url: "image/explantion.png",
                            scaledSize: new google.maps.Size(40, 40),
                            labelOrigin: new google.maps.Point(20, 17)
                        };
                        var marker = new google.maps.Marker({
                            position: {lat: explantion[i][1], lng: explantion[i][2]},
                            map: map,
                            label:{
                                color :'black',
                                fontWeight : 'bold',
                                fontSize : "18px",
                                text : i+1+""
                            },
                            icon : image
                        });
                        var code = explantion[i][0];
                        marker.code = code;
                        google.maps.event.addListener(marker,"click",function(){
                            element_detail_code = this.code;
                            console.log(element_detail_code);
                            $(".audio_file input[type=file]").val("");
                            $(".audio_file audio").attr("src","");
                            var modal = UIkit.modal("#modal-explanation");
                            if(modal.show()){

                                explantionVoice(this.code);

                            }
                        });
                        explantionMarker.push(marker);
                        count++;

                }

            }
        },
        error : function (){
            alert("deleteFail"+" ");
        }
    });
}
function startGuide(){
    if (cultural_code) {
        $("#startGuide audio").val("");
        $("#endGuide audio").val("");
        $(".sectionGuide audio").val("");

        $("#explan_cultural_name").text(cultural_name+" 解説ポイント");
        console.log("cultural_name" + cultural_name);
        $("#explanation_show").css("display","block");
    } else {
        console.log("cultural_code code 없더여" + cultural_code);
    }
}

function startAudioRegister(element_code) {
    console.log("cultural_name" + cultural_code);
    console.log("dadf + " + audio_file);
    if(audio_file.length > 0) {
        var form = new FormData();
        form.append('audio', audio_file[0]);
        form.append('language_code', language_code);
        form.append('cultural_code', cultural_code);
        form.append('element_code', element_code);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "audioAjaxUpload",
            type: "POST",
            processData: false,
            contentType: false,
            data: form,
            success: function (data) {
                alert("音声のアップロードの完了 :" + data);
                language_code = 1 ;
            },
            error: function () {
                alert("fail");
            }
        });

    }else{

    }

}

// qr 생성
function QRCreate(a,maxValue){
    console.log("mavValue cultr : "+ maxValue);
    console.log("QR :" + this.cultural_code);
    var code = encodeURIComponent(this.cultural_code);
    googleQRUrl = "https://chart.googleapis.com/chart?chs=177x177&cht=qr&chl="+code;
    a.parent().next().attr("src",googleQRUrl);
    console.log("a : " + maxValue);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "update_element",
        type : "POST",
        data : {
            maxValue : maxValue,
            element_detail_file : googleQRUrl
        },
        success : function (data) {
            alert("QRコードが登録されました。");
        },
        error : function (){
            alert("audio fail");
        }
    })
}



