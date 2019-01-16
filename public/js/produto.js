$.ajaxSetup({
    headers:{
        "X-CSRF-TOKEN":"{{ csrf_token() }}"
    }
});

/**
 * Carrega da tabela de produtos.
 */
$(function(){       
    let tr='';
    $.getJSON('/api/produtos/', function(datas){
    }).done(function(datas){
        datas.forEach(data =>{                                        
            tr += _loadTbody(data);
        })                                
        $('#tableProdutos>tbody').append(tr);
    }).fail(function(){
        console.log('erro');
    });
}); 

function loadsData(){
    this._clearBtn();
    this._carregaCategorias();
}

function _clearBtn(){        
    $('#nome').val('');
    $('#preco').val('');
    $('#quantidade').val('');
    $('#categoria_id').val('');       
}     
   
function _carregaCategorias(){
    let opcao ='';
    $.getJSON('/api/categorias/', function(datas){                
    }).done(function(datas){
        datas.forEach(data => {                    
            opcao += "<option value="+data['id']+">"+data['name']+"</option>";              
        });                 
        $('#categoria_id').append(opcao);                
    }).fail(function() {
        console.log( "error" );
    })                         
}

function _loadTbody(data){
    produtos = `<tr>
                    <td>${ data.id }</td>
                    <td>${ data.nome }</td>
                    <td>${ data.quantidade }</td>
                    <td>${ data.preco }</td>
                    <td>${ data.categoria_id }</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-flat btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                Ação
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-right">                                                                             
                                <li role="presentation">
                                    <button type="button" class="dropdown-item" tabindex="-1" id="delete" onclick="deleteProduto(${ data.id })" href="">Delete</button>
                                </li>                                                                                                                    
                                <li role="presentation">
                                    <button type="button" class="dropdown-item" tabindex="-1" id="editar" onclick="editarProduto(${ data.id })" href="">Editar</button>
                                </li>                                        
                            </ul>
                        </div>
                    </td>
                </tr>`;
    return produtos;
}

function deleteProduto(id){
    $.ajax({
        type: "DELETE",
        url: "/api/produtos/destroy/"+id,
        context: this,
        success: function(){
            linha = $("#tableProdutos>tbody>tr");
            td = linha.filter(function (index, element){
                return element.cells[0].textContent == id;
            });
            td.remove();
        },
        error: function(error){
            console.log(error);
        }
    })
}
function editarProduto(id){
    console.log('editar => '+id);
}

/**
 * Cria elemneto produto e atualiza a lista.
 */
$('#salvar').click(function(){
    prod = {
        nome:           $('#nome').val(),
        preco:          $('#preco').val(),
        quantidade:     $('#quantidade').val(),
        categoria_id:   $('#categoria_id').val()        
    };
    $.post('/api/produtos/store', prod, function (data) {
    }).done(function(data){
        $('#modelProdutos').modal('hide');          
        tr = _loadTbody(data);                                
        $('#tableProdutos>tbody').append(tr);
    }).fail(function(){
        console.log('erro ao salvar o arquivo.');
    })
});