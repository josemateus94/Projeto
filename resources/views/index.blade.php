@extends('layouts.master')

@section('body')
    <div class="jumbotron border border-secondary">
        <div class='row'>
            <div class='card-deck'>
                <div class='card border border-primary'>
                    <div class='card-border descricao'>
                        <h5 class="card-title">Cadastro de produtos</h5>
                        <p class="card-text">
                            Cadastra todos os produtos.
                            Favor conferir as categorias antes de efetuar o cadastro dos produtos.
                        </p>
                    </div>
                </div>
                <div class='card border border-primary'>
                    <div class='card-border descricao'>
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">
                            Cadastra todos as categorias.
                            Favor conferir as categorias.
                        </p>
                    </div>
                </div>
            </div>            
        </div>
    </div>
@endsection