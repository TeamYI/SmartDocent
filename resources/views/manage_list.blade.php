<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

</head>
<body>
@include('header')

<div style="margin-top: 70px">
    <p>cultural manage list</p>
@foreach ($list as $one)
        <div>
    {{$one ->cultural_name}}
        </div>
@endforeach
</div>
</body>
</html>