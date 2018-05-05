{{-- 지역별 문화재 창 띄우는 페이지--}}



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />

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

</head>
<body>
@include('header')
<style>
    #wrap {
        margin-top: 70px;
        width: 100%;
    }
    table {
        text-align: center;
        margin:130px auto;
        border-top: 2px solid black;
        border-bottom : 2px solid black;
    }
    th{
        padding: 10px 0;
        border-bottom : 1px solid black;
        background:#E7E7E7 ;
    }
    td{
        padding: 10px 0;
        border-bottom : 1px solid black;
    }
    h3 {
        margin: 0 auto;
    }

</style>
<script>
    function culturalManagePage(code){

        var form = $("#form");
        form.append('<input type="hidden" name="cultural_code" value="'+code+'" />');
        console.log("form : " + form.html());
        form.submit();
    }
</script>
<div id="wrap">
    <form id="form" action="mstest" method="get"></form>

    <table>
        <colgroup>
            <col width="100px" />
            <col width="900px" />
        </colgroup>
        <tr>
            <th>번호</th>
            <th>문화재 이름</th>
        </tr>
        @for($i=0;$i<count($list);$i++)
        <tr>
            <td>{{$i+1}}</td>
            <td><a href="javascript:culturalManagePage({{$list[$i]['cultural_code']}});">{{$list[$i]['cultural_name']}}</a></td>
        </tr>
        @endfor
    </table>
</div>

</body>
</html>