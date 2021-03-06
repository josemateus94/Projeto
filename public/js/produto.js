$.ajaxSetup({
    headers:{
        "X-CSRF-TOKEN":"{{ csrf_token() }}"
    }
});

/**
 * Carrega a tabela de produtos.
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
            opcao += "<option value="+data.id+">"+data.name+"</option>";              
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
            _printSuccessMsg('deletado');
        },
        error: function(error){
            console.log(error);
        }
    })
}

/**
 * Edita o  produtos informado.
 */
function editarProduto(id){        
    $('#categoria_id').html('');
    _carregaCategorias();    
    $.get("/api/produtos/edit/"+id, function(data){

    }).done(function(data){                
        $('#id').val(data.id);
        $('#nome').val(data.nome);
        $('#preco').val(data.preco);
        $('#quantidade').val(data.quantidade);
        $('#categoria_id').val(data.categoria_id);
        $('#modelProdutos').modal('show');        
    });    
}

$('#salvar').click(function(){    
    if (!$('#id').val()) {
        _store();
    }else{
        _update();
    }
});

/**
 * Cria o elemneto produto e atualiza a lista.
 */
function _store(){
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
        _printSuccessMsg('criado');
    }).fail(function(){
        console.log('erro ao salvar o arquivo.');
    })
}

/**
 * Atualiza os itens dos produtos.
 */
function _update(){
    prod = {
        id:             $('#id').val(),
        nome:           $('#nome').val(),
        preco:          $('#preco').val(),
        quantidade:     $('#quantidade').val(),
        categoria_id:   $('#categoria_id').val()        
    };
    $.post('/api/produtos/update', prod, function (data) {
    }).done(function(data){         
        if($.isEmptyObject(data.error)){           
            $('#modelProdutos').modal('hide');
            linha = $("#tableProdutos>tbody>tr");
            td = linha.filter(function (index, element){
                return element.cells[0].textContent == data.id;
            });
            if (td) {
                td[0].cells[1].textContent = data.nome;
                td[0].cells[2].textContent = data.quantidade;
                td[0].cells[3].textContent = data.preco;
                td[0].cells[4].textContent = data.categoria_id;
            }
            _printSuccessMsg('editado');
        }else{
            _printErrorMsg(data.error);
        }
    }).fail(function(){
        console.log('erro ao salvar o arquivo.');
    });
}

/**
 * Imprimi as mensagens de erros.
 */
function _printErrorMsg (msg) {    
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}

/**
 * Imprimi as mensagens de sucessos.
 */
function _printSuccessMsg(msg){
$('h5').append('<div class="alert alert-success" id="print-success-msg" style="display:block"><h6>Arquivo '+msg+' com sucesso!</h6></div>');                       
    setTimeout(function() {
        $('#print-success-msg').slideToggle(function(){ 
            $('h5 #print-success-msg').remove();
        });                
    }, 2500); 
}