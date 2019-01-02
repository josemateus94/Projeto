@extends('layouts.master')
<style></style>
@section('body')
    <div class='card border'>        
        <div class='card-body'>
            <div style="text-align: right" >
                <a class='btn btn-flat btn-sm btn-info' href="{{ URL::Route('adminCategorias') }}">Lista Categorias</a>
            </div>            
            <form action="<?= (isset($categoria))? URL::Route('adminCategoriasUpdate', $categoria->id): URL::Route('adminCategoriasStore') ?>" method="<?= (isset($categoria))? 'GET':'POST';?>">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome: </label>
                    <input type="text" name="name" id="nomeCategoria" class="form-control" placeholder="Nome da Categoria" aria-describedby="helpId"
                    value="<?= (isset($categoria))? $categoria->name: "" ?>">
                </div>    
                <button type="submit" class="btn btn-primary btn-sn">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sn">Cancelar</button>            
            </form>
        </div>
    </div>
@endsection