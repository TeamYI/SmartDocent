<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
    <style>
        #all {
            width: 100%;
            height : 650px;
            display: table;
        }
        #all-content{
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        #home_title {
            font-size: 58px;
        }
        input[type="text"] {
             font-size: 28px;
             margin-top: 10px;
             margin-right : 15px;
             width : 260px;
             height : 30px;
        }
        input[type="password"] {
             font-size: 28px;
             margin-top: 10px;
             margin-right : 15px;
             width : 260px;
             height : 30px;
        }

        input[type="submit"] {
            margin-top: 10px;
            margin-left: 18px;
            width : 266px;
            height : 45px;
        }




    </style>
</head>
<body>
<div id = 'all'>
    <div id="all-content">
        <div id='home_title'>SMART DOCENT</div>
        <form method='post' name = 'login_name' action = '/login'>
            <input type = "hidden" name = "_token" value="{{csrf_token()}}">
             <!-- laravel에서 post 전송시에는 csrf_token이 필요하기에 token을 포함해주어야함 -->
            <div>
                <span uk-icon="user" style="width:30px ; height: 30px"></span>
                <input type='text' name = 'id' placeholder='Username'>
            </div><!-- 아이디 텍스트-->
            <div>
                <span uk-icon="lock" style="width:30px ; height: 30px"></span>
                <input type='password' name = 'password' placeholder='password'>
            </div><!--  비밀번호 텍스트 -->
            <div>
                <input type='submit' value="로그인" onclick="" class="uk-button uk-button-primary">
            </div><!--  로그인 버튼-->
        </form>
    </div>
</div>
</body>
</html>