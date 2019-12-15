<?php 
 include_once $_SERVER["DOCUMENT_ROOT"] . '/Admin/topoAdmin.php';         
?>    

<div class="container">
    <div class="form-row">
        <div class="col-12">
            <p class="h1 border-bottom">Cadastro de categorias</p>
        </div>            
    </div>
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
       
        <button class="btn btn-primary" type="button" id="cadCategoria" name="cadCategoria">Cadastrar</button>
        
    </form>
    
</div>

<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/includes/rodape.php';
?>