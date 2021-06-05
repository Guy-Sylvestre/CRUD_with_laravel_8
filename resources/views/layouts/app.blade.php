<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('name')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

    @include('layouts.navbar')
    <div class="container">

        {{------------debut du contenue------------}}
            @yield('contenu')
        {{------------fin du contenue------------}}
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>