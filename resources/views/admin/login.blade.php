<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .loginForm{
        padding: 30px;
        border: 2px dashed lightgray;
    }
    .loginElement{
        margin: 10px 0px;
    }
</style>
<body>
    <div class="loginForm">
        <span class="loginElement">Login Form</span>
        @session('error')
                        <div class="alet alert-danger my-2">
                            {{session('error')}}
                        </div>
                    @endsession
        <form action="{{route('admin.auth')}}" method="POST">
            @csrf
            <input class="loginElement" type="text" name="email" placeholder="E-mail">
            <input class="loginElement" type="text" name="password" placeholder="Password">
            <button class="loginElement">Gönder</button>
        </form>
    </div>
</body>
</html>