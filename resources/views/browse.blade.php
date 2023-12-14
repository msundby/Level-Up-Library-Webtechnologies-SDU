<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Browse All Games</title>
  <script defer src="{{ asset('js-lul/browse.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css-lul/browse.css') }}">
</head>
    <header>
        @include('nav-bar')
    </header>
<body>
<img id="loading" src="{{ asset('img/LoadSlot.gif') }}">
<div id="allgames">

</div>

</body>
</html>
