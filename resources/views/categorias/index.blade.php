@extends('layouts.master')

@section('body')
    <div class='card border'>
        <div class='card-body'>
            <h5 class='card-title'> Lista de Categorias</h5>
            @if (count($categorias) > 0)                
                <table class='table table-ordered table-hover'>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-flat btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                            Ação
                                            <span class="caret"></span>
                                        </button>
        
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <!-- DELETAR -->                                        
                                            <li role="presentation">
                                                <a class="dropdown-item" tabindex="-1" id="deletar" onclick="return confirm('Deseja mesmo deletar a categoria?');" href="{{ URL::Route('adminCategoriasDestroy', $categoria->id) }}">Deletar</a>
                                            </li>                                        
        
                                            <!-- EDITAR -->                                        
                                            <li role="presentation">
                                                <a class="dropdown-item" tabindex="-1" id="editar" href="{{ URL::Route('adminCategoriasEdit', $categoria->id) }}">Editar</a>
                                            </li>                                        
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection


