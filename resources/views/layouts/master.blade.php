<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <style>
        .container{
            padding-top: 10px;
        }
	.descricao{
            padding: 20px;
        } 
    </style>
</head>
<body>

    @component('layouts.menu')
    @endcomponent
    <div class="container" id="container"> 
        <main role="main">
            @yield('body')
        </main>
    </div>    
</body>
<script src="{{ asset('js/app.js') }}" type='text/javascript'></script>
</html>