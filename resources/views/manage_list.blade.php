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
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"서울특별시")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"경기도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"강원도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"충청북도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"충청남도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"인천광역시")!== false)
                    <a href="/mstest">
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
    {{--ms대구--}}
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"대구광역시")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"경상북도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"경상남도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"전라북도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"전라남도")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"울산광역시")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"부산광역시")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"대전광역시")!== false)
                    <a href="/mstest">
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
    <ll>
        <ul>
            @foreach($type_one as $one)
                @if(strpos($one->cultural_address ,"제주도")!== false)
                    <a href="/mstest">
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
</div>

</body>
</html>