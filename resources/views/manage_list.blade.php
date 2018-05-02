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
<div style="margin-top: 70px"></div>
    {{-- 임시삭제
    20180429ms
        <p>cultural manage list</p>
@foreach ($list as $one)
        <div>
    {{$one ->cultural_name}}
        </div>
@endforeach
--}}



<div {{--style ="width:340px; margin-top: 100px; margin-left: 600px;"--}}>
    <ll>
        <ul>
            @foreach($list as $list)
                <a href="mstest?cultural_code={{$list->cultural_code}}">
                <div style="color:black; border-bottom:1px solid; text-align:center; ">
                    <div style="display: table-cell; vertical-align:middle; text-align:center; ">
                        {{$list->cultural_name}}
                    </div>
                </div>
                </a>
            @endforeach
        </ul>
    </ll>
   {{--
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"대구광역시")!== false)

                    <a href="mstest?cultural_name={{$one->cultural_name}}">
                        <div style="color:black; border-bottom:1px solid; text-align:center; ">
                            <div style="display: table-cell; vertical-align:middle; text-align:center; ">
                            <br>{{$one->cultural_name}}
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </ul>
    </ll>
    --}}
</div>

</body>
</html>