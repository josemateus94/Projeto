@extends('layouts.master')

@section('body')
    <main role='main'>
        <div class='row'>
            <div class="container col-sm-8 offset-md-2">
                <div class="card border">
                    <div class='card-header'>
                        <div class='card-title' style='text-align: center'>
                            Cadastro de Cliente
                        </div>
                        @if ($errors->any())
                            <div class='card-footer alert-danger'>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>                                    
                                @endforeach
                            </div>
                        @endif

                    </div>                
                    <div class='card-body'>
                        <div style='text-align: right'>
                            <a class="btn btn-info btn-sm" href='{{ URL::Route('adminUsuario') }}'>Lista Usuarios</a>
                        </div>
                        <form action="{{ URL::Route('adminStore') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control {{ $errors->has('nome')? 'is-invalid':'' }}" placeholder="Informe o nome" value='{{ old('nome') }}'>
                                @if ($errors->has('nome'))
                                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade:</label>
                                <input type="number" name="idade" id="idade" class="form-control {{ $errors->has('idade')? 'is-invalid':'' }}" placeholder="Informe a idade" value="{{ old('idade') }}">
                                @if ($errors->has('idade'))
                                    <div class="invalid-feedback">{{ $errors->first('idade') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereco:</label>
                                <input type="text" name="endereco" id="endereco" class="form-control {{ $errors->has('endereco')? 'is-invalid':'' }}" placeholder="Informe a endereco" value='{{ old('endereco') }}'>
                                @if ($errors->has('endereco'))
                                    <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" id="email" class="form-control {{ $errors->has('email')? 'is-invalid':'' }}" placeholder="Informe a e-mail" value='{{ old('email') }}'>
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>                                                                                                        
                            <button type="submit" class='btn btn-primary btn-sm'>Salvar</button>
                            <a class='btn btn-danger btn-sm' href='{{ URL::Route('adminUsuario') }}'>Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
