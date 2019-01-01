<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">        
    <meta name='csrf-token' contennt="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        #container{
            padding-top: 10px;
        }
        .descricao{
            padding: 20px;
        }
        .nav-link{
            color: #fff;
        }
    </style>
    <title>Cadastrode Produtos</title>
</head>
<body>
    @component('layout.menu')
    @endcomponent
    <div class="container" id="container">        
        <main role="main">
            @yield('body')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" type='text/javascript'></script>
</body>
</html>