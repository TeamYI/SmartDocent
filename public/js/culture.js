var map;
var markers = [] ; // 지도에 마커를 넣기 위한 배열
var uniqueId = 1; //배열에 마커를 넣기위해 인덱스값
var ms_markers = [] // 지도에 해설포인트.마커를 넣기 위한 배열
var ms_uniqueId = 1; //배열에 해설포인트마커를 넣기위해 인덱스값
var map_illustrations = []; //일러스트 이미지 배열에 넣기
var img_src = "" ; // 지도에 이미지를 넣을 때 담는 변수
var map_latLng_event ; // 안내소 이미지를 드래그할때 일어나는 구글맵 이벤트 담는 변수
var ms_point_count = 0; // ms_지도에 찍히는 번호 담는 변수 선언 (전역)
var ms_number_list = []; // 번호담는 배열 선언(전역) [0]은 넣는 순서, [1] : 위도, [2] : 경도 , [3] : 이미지

$(document).ready(function(){

    //지도 불러오기
    map = new google.maps.Map(document.getElementById("menu_content_map"),{
        center : {lat: 35.790126, lng: 129.331936},
        zoom: 19,
    })

    //위도, 경도 값 불러오기
    google.maps.event.addListener(map, 'click', function(mouseEvent){
        console.log("mouser  L : "  + mouseEvent.latLng);
    })

    // nav content 내용 바꾸기
    $(".nav_content:first").show();
    $(".nav_check:first").css("border-bottom","#4B4B4B 3px solid");

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
                        + "<option value='korean' selected>한국어</option>"
                        + "<option value='english'>영어</option>"
                        + "<option value='chinese'>중국어</option>"
                        + "<option value='japanese'>일본어</option>"
                        + "</select>"
                        + "<div class='culture_name'>"
                            + "<div>문화재명</div>"
                            + "<input type='text'>"
                        + "</div>"
                        + "<div class='culture_detail'>"
                            + "<div>문화재 설명</div>"
                            + "<textarea name='' id='' cols='90' rows='5'></textarea>"
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
        alert(cultural_code);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : 'oneTypeCulturalShow' ,
            type : 'POST',
            data : {
                cultural_code : cultural_code
            },
            dataType: 'json',
            success : function(data){
                if(data.length) {
                    var text = "";
                    for (var i = 0; i < data.length; i++) {
                        console.log("dddd");
                        language[i] = new Array(4);
                        language[i][0] = data[0].language;
                        language[i][1] = data[0].cultural_name;
                        language[i][2] = data[0].cultural_detail_explain;
                        language[i][3] = data[0].cultural_detail_code;

                        text += "<div class='culture_explanation_language'>"
                            + "<input type='hidden' name='data-detail-code-" + i + "' value=" + data[i].cultural_detail_code + ">"
                            + "<div class='culture_language'>"
                            + "<div>언어명 : </div>"
                            + "<div data-code=''>" + data[i].language + "</div>"
                            + "</div>"
                            + "<div class='culture_name'>"
                            + "<div>문화재명</div>"
                            + "<div>" + data[i].cultural_name + "</div>"
                            + "</div>"
                            + "<div class='culture_detail'>"
                            + "<div>문화재 설명</div>"
                            + "<div>" + data[i].cultural_detail_explain + "</div>"
                            + "</div>"
                            + "</div>";
                    }
                    $("#modal-one-show .culture_explanation").append(text);

                    $("#modal-one-show .one_cultural_name").text(data[0].cultural_name);
                    culture_ex[0] = data[0].cultural_name;
                    if (data[0].cultural_image) {
                        var upload = 'uploads/' + data[0].cultural_image;
                        $("#modal-one-show .culture_image > img").attr("src", upload);
                    } else {
                        $("#modal-one-show .culture_image > img").attr("src", "image/no-image.png");
                        culture_ex[1] = data[0].cultural_name;
                    }
                    if (data[0].ar) {
                        var upload = 'uploads/' + data[0].ar;
                        $("#modal-one-show .culture_ar > img").attr("src", upload);
                        culture_ex[2] = data[0].ar;
                    } else {
                        $("#modal-one-show .culture_ar > img").attr("src", "image/no-image.png");
                    }
                    if (data[0].qr) {
                        var upload = 'uploads/' + data[0].qr;
                        $("#modal-one-show .culture_qr > img").attr("src", upload);
                        culture_ex[3] = data[0].qr;
                    } else {
                        $("#modal-one-show .culture_qr > img").attr("src", "image/no-image.png");
                    }
                    $("#modal-one-show .culture_address > div:nth-child(2)").text(data[0].cultural_address);
                    culture_ex[4] = data[0].cultural_address;
                }

            },
            error : function(){
                alert("실패");
            }
        })
    });

    //수정 버튼 눌렀을 때
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
       name = name + " 문화재 등록";
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
            data : {
                cultural_code : cultural_code,
                cultural_include : cultural_include
            },
            success : function(data){
                if(data.length){
                    var text = "";
                    for (var i = 0; i < data.length; i++) {
                        console.log("dddd");

                        text += "<div class='culture_explanation_language'>"
                            + "<input type='hidden' name='data-detail-code-" + i + "' value=" + data[i].cultural_detail_code + ">"
                            + "<div class='culture_language'>"
                            + "<div>언어명 : </div>"
                            + "<div data-code=''>" + data[i].language + "</div>"
                            + "</div>"
                            + "<div class='culture_name'>"
                            + "<div>문화재명</div>"
                            + "<div>" + data[i].cultural_name + "</div>"
                            + "</div>"
                            + "<div class='culture_detail'>"
                            + "<div>문화재 설명</div>"
                            + "<div>" + data[i].cultural_detail_explain + "</div>"
                            + "</div>"
                            + "</div>";
                    }
                    $("#modal-two-show .culture_explanation").append(text);

                    $("#modal-one-show .two_cultural_name").text(data[0].cultural_name);
                }
            },
            error : function(){
                alert("실패");
            }
        })
    });


    //지도에 문화재 이미지 입힐 때
    // 일러스트
    $(".drag_image").draggable({
        accept : ".drag_image",
        helper : "clone",
        drag : function (event, ui) {
            img_src = $(this).attr("src");
        },
        cursor : "pointer"

    })

    //안내 이미지
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


    $("#menu_content_map").droppable({
        accept : ".drag_image",
        greedy: true,
        drop : function(event,ui){

            map_latLng_event = google.maps.event.addListener(map, 'mouseover', function (mouseEvent) {
                mapPositionImage(mouseEvent.latLng,img_src);
            })

            console.log("img srcs tyipe " + img_src);

        }
    })

    //일러스트 이미지 - 파일업로드 클릭했을때
    $("#input_img").on("change",handleImgFileSelect);

})


function ms_number(count){
    var number = count+1;
    var image = document.getElementById('ms_img');

    image.src="/image/number_"+number+".png";
}


//구글 위도, 경도 알아내는 이벤트 발생할 때 위도 경도값에 마커띄워줌
function mapPositionImage(position,img_src){
    var result;
    result = position + "" ;

    console.log("position5 : " + result+ "img_src : " + img_src);

    if(img_src != "") {
        result = result.replace(/\)/g,"");
        result = result.replace(/\(/ig,"");
        result = result.split(",") ;
        console.log("position2 : " + img_src.substr(0,9));

        // ms_해설 이미지 등록 할때
        var ms_img_src = img_src;
        var ms_location=[];
        if(ms_img_src.substr(0,13) == "/image/number"){

            ms_location.push(ms_point_count);
            ms_location.push(result[0]);
            ms_location.push(result[1]);
            ms_location.push(img_src);
            ms_number_list.push(ms_location);

            ms_point_count++; //ms_지도 한번찍을때마다 번호+1
            //ms_포인트리스트에 동적으로 html 소스 추가
            var html = "<li data-code=list_"+ms_point_count+">" +
                ms_point_count + "<BR>" +
                result[0]+"<BR>" + result[1] + "</li>";

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

            var ms_count = 0;
            $temp = [];
            //ms_배열의 값과 li 순서를 동일하게 해주는 소스
            $("#ms_point_list>li").each(function(index){
                $list_count = index;
                $temp.push(($(this).text()).substr(0,1));


            });

            /*지도 위 해설포인트 삭제하는 소스*/
        }

        var temp0 = [];

        for(var i=0;i<ms_number_list.length;i++){
            var temparray = [];
            temparray.push(ms_number_list[$temp[i]-1][0]);
            temparray.push(ms_number_list[$temp[i]-1][1]);
            temparray.push(ms_number_list[$temp[i]-1][2]);
            //temparray.push(ms_number_list[$temp[i]-1][3]);
            temp0.push(temparray);
        }
        for(var i=0;i<ms_number_list.length;i++){
            ms_number_list[i][0] = temp0[i][0];
            ms_number_list[i][1] = temp0[i][1];
            ms_number_list[i][2] = temp0[i][2];
            //ms_number_list[i][3] = temp0[i][3];
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
                scaledSize: new google.maps.Size(25, 25)
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
            });
            ms_markers.push(ms_marker);
            this.img_src = "";
            google.maps.event.removeListener(map_latLng_event);
        }

        else {
            var marker = new google.maps.Marker({
                position: {lat: Number(result[0]), lng: Number(result[1])},
                map: map,
                icon: image
            });

            //Set unique id
            marker.id = uniqueId;
            uniqueId++;

            //마커 클릭했을 때, infowindow창 나타남
            var infowindow = new google.maps.InfoWindow({
                content: 'Latitude: ' + Number(result[0]) + '<br />Longitude: ' + Number(result[1])
                + "<br/><input type = 'button' value = 'Delete' onclick = 'DeleteMarker(" + marker.id + ");' value = 'Delete' />"
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
            markers.push(marker);
            this.img_src = "";
            console.log("img_srceeee3333 : " + this.img_src);
            google.maps.event.removeListener(map_latLng_event);
        }

        ms_DeleteMarker();
        ms_MakeMarker(map);

    }

}
// 배열에 담긴 배열 포인트  그려줌
function ms_MakeMarker(map){
    for(var i = 0; i<ms_number_list.length;i++){
        var image = {

            url: ms_number_list[i][3],
            scaledSize: new google.maps.Size(20, 20)
        };

        var ms_marker = new google.maps.Marker({
            position : {lat : Number(ms_number_list[i][1]), lng: Number(ms_number_list[i][2])},
            map: map,
            icon: image
        });
        //Set unique id
        ms_marker.id = i;

        //ms_마커 클릭했을 때, infowindow창 나타남
        var infowindow = new google.maps.InfoWindow({
            content: 'Latitude: ' + Number(ms_number_list[i][1]) + '<br />Longitude: ' + Number(ms_number_list[i][2])
            + "<br/><input type = 'button' value = 'Delete' onclick = 'DeleteMarker(" + ms_marker.id + ");' value = 'Delete' />"
        });
        ms_marker.addListener('click', function() {
            infowindow.open(map, ms_marker);
        });
        ms_markers.push(ms_marker);
        this.img_src = "";
        google.maps.event.removeListener(map_latLng_event);

    }
}

// 모든 마커 삭제 함수
function ms_DeleteMarker(){
    for(var i = 0; i < ms_markers.length; i++){
        ms_markers[i].setMap(null);
    }
    ms_markers.splice(0,ms_markers.length);
}

// 마커 삭제 함수
function DeleteMarker(id) {
    console.log("marker_id : " + id);
    for(var i = 0; i < ms_markers.length; i++){
        if(ms_markers[i].id == id){
            ms_markers[i].setMap(null);
            ms_markers.splice(i,1);
        }
    }


    //Find and remove the marker from the Array
    for (var i = 0; i < markers.length; i++) {
        if (markers[i].id == id) {
            //Remove the marker from Map
            markers[i].setMap(null);

            //Remove the marker from array.
            markers.splice(i, 1);
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
    //이미지 정보 초기화
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
            alert("확장자는 이미지 확장자만 가능합니다.");
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

// 일러스트 이미지 삭제
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

var geocoder ;

function geocoding(address){
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

