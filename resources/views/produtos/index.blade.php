@extends('layouts.master')

@section('body')
    <div class='card border'>
        <div class='card-body'>
            <h5 style='text-align: center'class='card-title'> Lista de Produtos</h5>
            <div style='text-align: right; padding-bottom: 5px'>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modelProdutos" onclick="loadsData();">Cadastrar Produtos</button>                
            </div>                     
            <table class='table table-ordered table-hover' id='tableProdutos'>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>                        
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal create -->
    @include('produtos.create')    
@endsection
@section('javascript')
    <script src="{{ asset('js/produto.js') }}" type='text/javascript'></script>
@endsection