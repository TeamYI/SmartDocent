<!doctype html>
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
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCojf9IKqAfeYPYAuRGi-CbRDRxW9KhEtM
"></script>
</head>
<body>
@include('header')
        <div>
                <form method='POST' name = 'member_serch' action='/member_serch'>
                <input type = "hidden" name = "_token" value="{{csrf_token()}}">
                <input type="text" name = 'serch_id' placeholder="검색어 입력">
                <input type = "submit" value="검색">
                </form>
        </div>
<div>
        <table border="1" width = "600">
                <thead>
                <tr align="center">
                        <th>아이디</th><th>비밀번호</th><th>수정/삭제</th>
                </tr>
                </thead>
        <tbody>
<?PHP
        $count = 0;
        foreach($result as $res)
        {
            $id = $res->id;
            $pw = $res->pw;
        ?>
        <tr align="center">
                <th>
                    <?PHP echo $id; ?>
                </th>
                <th>
                    <?PHP echo $pw; ?>
                </th>
                <th>
                        <form method="POST" action="/page_update" style="float:left;">
                                <input type = "hidden" name = "_token" value="{{csrf_token()}}">
                                <input type = "hidden" name = "update_id" value=<?PHP echo $id; ?>>
                                <input type = "hidden" name = "update_pw" value=<?PHP echo $pw; ?>>
                                <input type="submit"  value="수정"></input>
                        </form>
                        <form method="POST" action = "/member_delete" style="float:left;">
                                <input type = "hidden" name = "_token" value="{{csrf_token()}}">
                                <input type = "hidden" name = "delete_id" value=<?PHP echo $id; ?>>
                                <input type="submit"  value="삭제"></input>
                        </form>
                </th>
        </tr>
        <?PHP
        }
            ?>
        </tbody>
        </table>
</div>
</body>
</html>