<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Create Account Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('css-lul/styleCreate.css') }}">
    <script defer src="{{ asset('js-lul/loginAndCreate.js') }}"></script>
</head>
<body>
    <div class="center">

        <div class="createForm" id="createForm">

            <label for="show" class="closebtn fas fa-times" title="close" onclick="closeCreate()"></label>
            <div class="text">Create Account</div>

            @if ($errors->any())
                <div id="validationMessage">
            @foreach($errors->all() as $err)
            <li style="color: red">{{$err}}</li>
            @endforeach
                </div>
            @endif
                <form method ="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="data">
                        <label>Username</label>
                        <input id="name" type="text" name="name" required placeholder="Enter username" value="{{ old('name') }}">
                    </div>
                    <div class="data">
                        <label>Email</label>
                        <input id="email" type="email" name="email" required placeholder="Enter email" value="{{ old('email') }}">
                    </div>
                    <div class="data">
                        <label>Password</label>
                        <input type="password" name="password" required autocomplete="new-password" placeholder="Enter password">
                        <div class="passrq">
                            <label> • Passwords must be at least 8 characters</label>
                        </div>
                    </div>
                    <div id="gapForPassword" class="data">
                        <label>Password Confirmation</label>
                        <input type="password" name="password_confirmation" required placeholder="Confirm password">
                    </div>
                    <div class="create-account">
                        <div class="create"></div>
                        <button type="submit">Create Account</button>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>
