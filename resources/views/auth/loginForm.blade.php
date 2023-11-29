<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Login Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('css-lul/styleLogin.css') }}">
    <script defer src="{{ asset('js-lul/loginAndCreate.js') }}"></script>
</head>

<body>
<div class="center">

    <div class="loginForm" id="loginForm">
        @isset ($rating_error)
        <p id="rating-error">{{$rating_error}}</p>
        @endisset
        <label for="show" class="closebtn fas fa-times" title="close" onclick="closeLogin()"></label>
        <div class="text">Login</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="data">
                <label for="email">Username or Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter username or email">

            </div>

            <div class="data">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter password">

            </div>

            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>

            <div class="btns">
                <div class="inner"></div>
                <button type="submit">Login</button>
            </div>
            <div class="break-line">
                <div class="line"></div>
                <div class="dot">or</div>
                <div class="line"></div>
            </div>

            <div class="btns">
                <div class="create"></div>
                <a href="{{ route('register') }}"">
                <button type="button" id="createbtn" onclick="openCreate()" style="text-decoration:none; cursor:pointer;">Create Account</button>
                </a>
            </div>

            <div class="forgot-password">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>
    </div>
        </form>
</div>
</body>
</html>
