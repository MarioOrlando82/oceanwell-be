<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OceanWell</title>
    <link rel="stylesheet" href="{{asset('css/Login.css')}}">
</head>
<body>
    <div class="banner">
        <div class="logo">
            <img src="../Aset/Logo/OceanWell's Logo.png" alt="">
        </div>

        <div class="wrapper">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login</h1>
                <hr class="horizontalLine">
                <div class="userName">
                    <label>Username / Email</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="email">
                </div>
                <div class="password">
                    <label>Password</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password">
                </div>
                <div class="button">
                    <button type="submit" class="btn">Login</button>
                </div>
                <hr class="horizontalLine">
                <div class="registerLink">
                    <a href="">Haven't made an account?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
