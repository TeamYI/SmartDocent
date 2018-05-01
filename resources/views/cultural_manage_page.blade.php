{{-- 문화재 관리창 --}}



<html>
<head>

    <style>
        ul, li {list-style:none; margin:0; padding:0; font-size:10pt; }

        .image_list {clear:both;overflow: hidden;position: relative;height: 1300px;width: 6000px; border:1px solid #e1e1e1; }
        .image_list .images {position:absolute; display:none; }

        .tab {width:600px;cursor:pointer;}
        .tab li {width:70px;float:left;border-right:1px solid #e1e1e1;border-top:1px solid #e1e1e1;padding:7px;}
        .tab li.fir {border-left:1px solid #e1e1e1;}

        .tab_icon {width:600px;cursor:pointer;}
        .tab_icon li {float:left;}

        .tab li.tabOutClass {font-weight:normal;color:#707070;background-color:#D0D0D0}
        .tab li.tabOverClass {font-weight:bold;color:#000;background-color:#fff;}
    </style>

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
        한국어 version page
    </div>
    <div class="images content_frame">English version page</div>
    <div class="images content_frame">中文 version page</div>
    <div class="images content_frame">日本語 version page</div>
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