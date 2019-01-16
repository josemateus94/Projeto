@include('layouts.erros')

<div class="modal fade" id="modelProdutos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro de Produtos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <input type="hidden" name="id" value="<?= (isset($produtos))? $produtos->nome:  old('nome') ?>">              
                    <div class="form-group">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Produtos" aria-describedby="helpId"
                        value="<?= (isset($produtos))? $produtos->nome:  old('nome') ?>">
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade: </label>
                        <input type="number" name="nome" id="quantidade" class="form-control" placeholder="Quantidade do Produtos" aria-describedby="helpId"
                        value="<?= (isset($produtos))? $produtos->quantidade:  old('quantidade') ?>">
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço: </label>
                        <input type="number" name="nome" id="preco" class="form-control" placeholder="Preco do Produtos" aria-describedby="helpId"
                        value="<?= (isset($produtos))? $produtos->preco:  old('preco') ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoria: </label>
                        <select name="categoria_id" class="form-control" id="categoria_id">                            
                        </select>
                    </div> 
                </div>            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" id='salvar' class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
