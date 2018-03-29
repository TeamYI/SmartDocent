<html>
<head>
        <style>
                #home_title {
                        color: black;
                        font-size: 50px;
                        font-weight: 1000px;
                        width: 1500px;
                        margin: 0 auto;
                }
        </style>
</head>
<body>

<div id='home_title' style="text-align:center">SMART DOCENT</div>

<ul>
        <a href="/cultural_manage">문화재 등록</a></li>
        <a href="/member_get">회원 관리</a></li>
</ul>
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