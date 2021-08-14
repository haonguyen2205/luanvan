<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>{{$body}}</h2>
    <h2>tài khoản của bạn được tạo với tên: {{$name}}</h2>
    
    <h2>nhấn vài link dưới đây để kích hoạt tài khoản</h2>
    <form action="{{URL('/verify-account/'.$token)}}" method="post" enctype="multipart/form-data">
        <input type="hidden" value="{{$user_id}}" name="id"/>

        <input type="submit" name="submit" value="Active"/>
    </form>

    <h1>mã xác thực của bạn là : {{$token}} </h1>
    <div><a href="">active</a></div>

    
</body>
</html>