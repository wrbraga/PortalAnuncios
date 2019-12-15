<?php
    include_once dirname(__DIR__,1) . '/Admin/topoAdmin.php';    
?>

<div class="container">
    <form id="formCadCategoria" action="" method="post">        
        <div class="form-group">    
            <label for="nome">Titulo</label>                
            <input class="form-control" type="text" placeholder="" id="tituloCategoria">
        </div>
        
        <div class="form-row">
            <div class="col-9">
                <div class="form-group">                
                    <label for="endereco">Imagem</label>                  
                    <input class="form-control-file" type="file" id="imagem" name="imagem">
                </div>
            </div>                        
        </div>
        
        <div class="form-row">
        
        <button class="btn btn-success w-50" type="button" id="cadCategoria" name="cadCategoria">Cadastrar</button>
        <button type="button" class="btn btn-danger w-50" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">Fechar</span>
        </button>
        </div>
        
    </form>
    
</div>