<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level Up Library</title>
    <link rel="stylesheet" href="{{ asset('css-lul/errorpage.css') }}">
    <script defer src="{{ asset('js-lul/errorpage.js') }}"></script>
    <script src="https://kit.fontawesome.com/e7bbbc0c8d.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    @include ('nav-bar')
</header>
<div id="error-box">

    <h1>{{ $error }}</h1>
</div>

</body>
</html>
