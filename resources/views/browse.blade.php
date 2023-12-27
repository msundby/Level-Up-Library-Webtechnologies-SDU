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
        @if(session('success'))                                                             <!-- Extension -->
        <div class="alert alert-success-box" id="alertSuccessBox">                          <!-- Extension -->
            {{ session('success') }}                                                        <!-- Extension -->
        </div>                                                                              <!-- Extension -->
        <script>                                                                            <!-- Extension -->
            setTimeout(function() {                                                         <!-- Extension -->
                document.getElementById('alertSuccessBox').style.display = 'none';          <!-- Extension -->
            }, 5000);                                                                       <!-- Extension -->
        </script>                                                                           <!-- Extension -->
        @endif                                                                              <!-- Extension -->
    </header>
<body>
<img id="loading" src="{{ asset('img/LoadSlot.gif') }}">
<div id="allgames">

</div>

</body>
</html>
