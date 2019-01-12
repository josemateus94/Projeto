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
                    <!--<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-flat btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    Ação
                                    <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">
                                                                            
                                    <li role="presentation">
                                        <a class="dropdown-item" tabindex="-1" id="deletar" onclick="return confirm('Deseja mesmo deletar a categoria?');" href="">Deletar</a>
                                    </li>                                        

                                                                         
                                    <li role="presentation">
                                        <a class="dropdown-item" tabindex="-1" id="editar" href="">Editar</a>
                                    </li>                                        
                                </ul>
                            </div>
                        </td>-->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal create -->
    @include('produtos.create')    
@endsection
@section('javascript')
    <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            "X-CSRF-TOKEN":"{{ csrf_token() }}"
        }
    })
        function loadsData(){
            this._clearBtn();
            this._carregaCategorias();
        }
        function _clearBtn(){        
            $('#nome').val('');
            $('#preco').val('');
            $('#quantidade').val('');
            $('#departamento').val('');   
            
        }        
        function _carregaCategorias(){
            let opcao ='';
            $.getJSON('/api/categorias/', function(datas){                
            }).done(function(datas){
                datas.forEach(data => {                    
                    opcao += "<option value="+data['id']+">"+data['name']+"</option>";              
                });                 
                $('#departamento').append(opcao);                
            }).fail(function() {
                console.log( "error" );
            })                         
        }

        $(function(){       
            let tr='';
            $.getJSON('/api/produtos/', function(datas){
            }).done(function(datas){
                datas.forEach(data =>{                                        
                    tr += teste(data);
                })                                
                $('#tableProdutos>tbody').append(tr);
            }).fail(function(){
                console.log('erro');
            })
        });   

        function teste(data){
            produtos = `<tr>
                            <td>${ data['id'] }</td>
                            <td>${ data['nome'] }</td>
                            <td>${ data['quantidade'] }</td>
                            <td>${ data['preco'] }</td>
                            <td>${ data['categoria_id'] }</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-flat btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                        Ação
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-right">                                                                             
                                        <li role="presentation">
                                            <a class="dropdown-item" tabindex="-1" id="deletar" onclick="return confirm('Deseja mesmo deletar a categoria?');" href="">Deletar</a>
                                        </li>                                                                                                                    
                                        <li role="presentation">
                                            <a class="dropdown-item" tabindex="-1" id="editar" href="">Editar</a>
                                        </li>                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>`;
            return produtos;
        }                      
    </script>
@endsection