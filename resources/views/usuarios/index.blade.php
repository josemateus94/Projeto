@extends('layouts.master')

@section('body')
<main role='main'>
        <div class='row'>
            <div class="container col-sm-8 offset-md-2">
                <div class="card border">
                    <div class='card-header'>
                        <div class='card-title' style='text-align: center'>
                            Lista de Cliente
                        </div>
                    </div> 
                    @if (isset($usuarios) && count($usuarios)>0)
                        <div class='card-body'>
                            <table class='table table-bordered table-hover'>
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Idade</th>
                                            <th>Endereço</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->nome }}</td>
                                            <td>{{ $usuario->idade }}</td>
                                            <td>{{ $usuario->endereco }}</td>
                                            <td>{{ $usuario->email }}</td>
                                        </tr>
                                        @endforeach                                
                                    </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection