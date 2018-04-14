<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
    <style>
        #cultural_wrap {
            text-align : center;
        }
        #cultural_list {
            position : relative;
            width : 80% ;
            border : 1px solid black;
            height : 600px;
            display:inline-block;
            background:skyblue;
        }
        #cultural_list_name {
            position: absolute;
            top : 0;
            left : 50px ;
        }
        #cultural_list li {
            list-style-type: none;
        }
        #cultural_type {
            position: absolute;
            float: left;
            width: 100px;
            top : 0;
            right: 200px ;
        }
        #cultural_type li:first-child {
            float: left;
            margin-right: 20px ;
        }
        #cultural_type a {
            text-decoration: none;
            color: black;
            font-size: 20px;
        }
    </style>
</head>
<body>
@include('header')
<div id="cultural_wrap">
    <div id="cultural_list">
        <h2 id="cultural_list_name">문화재 리스트</h2>
        <div id="cultural_type">
            <li><a href="#">1차</a></li>
            <li><a href="#">2차</a></li>
        </div>
        <div id="cultural_search">
            <input type="text" placeholder="검색">
            <button>검색</button>
        </div>
    </div>
    <form action="{{URL::to('update_element') }}" method="post" enctype="multipart/form-data">
        <input type="submit">
    </form>
</div>
</body>
</html>