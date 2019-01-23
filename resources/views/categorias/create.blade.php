@extends('layouts.master')

@section('body')
    <main role='main'>
        <div class='row'>
            <div class="container col-sm-8 offset-md-2">
                <div class="card border">
                    <div class='card-header'>
                        <div class='card-title' style='text-align: center'>
                            <?= (isset($categoria))? "Editar Categoria": "Cadastar Categoria" ?>
                        </div>
                        @include('layouts.erros')                 
                    </div>                
                    <div class='card-body'>
                        <form action="<?= (isset($categoria))? URL::Route('adminCategoriasUpdate', $categoria->id): URL::Route('adminCategoriasStore') ?>" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nomeCategoria">Nome: </label>
                                <input type="hidden" class="form-control" name="id" id="id" value="{{ (isset($categoria))? $categoria->id:  old('id') }}">
                                <input type="text" name="name" id="nomeCategoria" class="form-control" placeholder="Nome da Categoria" aria-describedby="helpId"
                                value="<?= (isset($categoria))? $categoria->name:  old('name') ?>">
                            </div>    
                            <button type="submit" class="btn btn-primary btn-sn">Salvar</button>                
                            <a class='btn btn-danger btn-sn' href="{{ URL::Route('adminCategorias') }}">Cancelar</a>                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
