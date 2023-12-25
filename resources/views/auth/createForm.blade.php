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
    <div class="flexContainer">
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
                        <div class="input-container" data-tool-tip="Must be between 2-20 characters. Can only contain letters, numbers, hyphen, and underscore.">
                            <input id="name" type="text" name="name" required placeholder="Enter username" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="data">
                        <label>Email</label>
                        <div class="input-container" data-tool-tip="Must be a valid email address.">
                            <input id="email" type="email" name="email" required placeholder="Enter email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="data">
                        <label>Password</label>
                        <div class="input-container" data-tool-tip="Must be at least 8 characters. Must contain at least one uppercase letter, one lowercase letter, and one number.">
                            <input type="password" name="password" required autocomplete="new-password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="data">
                        <label>Password Confirmation</label>
                        <input type="password" name="password_confirmation" required placeholder="Confirm password">
                    </div>
                    <button id="createButton" type="submit">Create Account</button>
                </form>
        </div>
    </div>
</body>
</html>
