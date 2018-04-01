var map;
var map_illustrations = []; //일러스트 이미지 배열에 넣기
var img_src = "" ; // 지도에 이미지를 넣을 때 담는 변수
var map_latLng_event ; // 안내소 이미지를 드래그할때 일어나는 구글맵 이벤트 담는 변수
var ms_point_count = 0; // ms_지도에 찍히는 번호 담는 변수 선언 (전역)

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

            console.log("img srcs tyipe " + typeof(img_src));

            }
    })

    //일러스트 이미지 - 파일업로드 클릭했을때
    $("#input_img").on("change",handleImgFileSelect);

})
//구글 위도, 경도 알아내는 이벤트 발생할 때 위도 경도값에 마커띄워줌
function mapPositionImage(position,img_src){
    var result;
    ms_point_count++; //ms_지도 한번찍을때마다 번호+1
    result = position + "" ;

    console.log("position : " + result+ "img_src : " + img_src.naturalWidth);

    if(img_src != "") {
        result = result.replace(/\)/g,"");
        result = result.replace(/\(/ig,"");
        result = result.split(",") ;
        console.log("position2 : " + img_src.substr(0,9));

        //ms_포인트리스트에 동적으로 html 소스 추가
        var html = "<li>"+"point : " + ms_point_count+"<BR>"+result[0]+ result[1]+"</li>"
        $("#ms_point_list").append(html);

        //일러스트이미지 등록할때
        if(img_src.substr(0,10) == 'data:image'){
            var image = {
                url: img_src,
                //size: new google.maps.Size(500, 500),
                //origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(250, 250),
            };
        }else { //
            var image = {
                url: img_src,
                //size: new google.maps.Size(500, 500),
                //origin: new google.maps.Point(0,0),
                //anchor: new google.maps.Point(200, 210),
                scaledSize: new google.maps.Size(25, 25)
            };
        }
        var beachMarker = new google.maps.Marker({
            position: {lat: Number(result[0]), lng: Number(result[1])},
            map: map,
            icon: image

        });
        this.img_src = "";
        google.maps.event.removeListener(map_latLng_event);
    }
}


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
function deleteImageAction(index){
    console.log("index : " + index) ;
    map_illustrations.splice(index,1);

    var img_id = "#img_"+index ;
    $(img_id).remove();
    console.log(map_illustrations);
}



