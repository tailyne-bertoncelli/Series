<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

</head>

<body>
<div class="container">
    <h3 class="mt-2 text-center">{{$title}}</h3>
    {{$slot}}
</div>
</body>
</html>


