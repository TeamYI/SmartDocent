<html>
<head>
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
    <style>
        #home_title {
            color: black;
            font-size: 32px;
            font-weight: 1000px;
            width: 1500px;
            margin: 0 auto;
        }

        #all{
            position: absolute;
            top: 50%;
            height: 240px;
            margin-top: -120px; /* 높이의 절반을 음수 마진으로 */
        }
    </style>
</head>
<body>
<div id = 'all'>
<div id='home_title' style="text-align:center">SMART DOCENT</div>

<form method='post' name = 'login_name' action = '/login'>
    <input type = "hidden" name = "_token" value="{{csrf_token()}}">
     <!-- laravel에서 post 전송시에는 csrf_token이 필요하기에 token을 포함해주어야함 -->
    <div style="text-align:center">
        <span uk-icon="user"></span>
        <input type='TEXT' name = 'id' value='Username'>
    </div><!-- 아이디 텍스트-->
    <div style="text-align:center">
        <span uk-icon="lock"></span>
        <input type='password' name = 'password' value='password'>
    </div><!--  비밀번호 텍스트 -->
    <div style="text-align:center">
        <input type='submit' value="로그인" onclick="">
    </div><!--  로그인 버튼-->
</form>
</div>
</body>
</html>