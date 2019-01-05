<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <title>Document</title>
    <style>
        .container{
            padding-top: 10px;
        }
    </style>
</head>
<body>

    @component('layouts.menu')
    
    @endcomponent   
    <div class="container">
        @yield('body')
    </div>    
</body>
<script src="{{ asset('js/app.js') }}" type='text/javascript'></script>
</html>