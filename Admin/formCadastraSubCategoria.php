<?php 
namespace Admin;

 include_once dirname(__DIR__,1) . '/Admin/topoAdmin.php';         
 include_once dirname(__DIR__,1) . '/App/ManipularCategorias.php';
       
$categorias = new \App\ManipularCategorias();
$categorias->listarCategorias();

?>    

<div class="container">
    <form id="formCadSubCategoria" action="" method="post">        
        <div class="form-group">    
            <label for="nome">Categoria</label>                            
            <select class="form-control" id="idCategoria" name='idCategoria' form="formCadSubCategoria">
            <?php            
            foreach ($categorias->categorias['dados'] as $categoria) {
                echo "<option value='".$categoria['id']."'>" . $categoria['titulo'] . "</option>";
            }
            ?>
            </select>
        </div>
        <div class="form-group">    
            <label for="nome">Titulo</label>                
            <input class="form-control" type="text" placeholder="" id="titulo" name="titulo">
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
            <button class="btn btn-primary w-50" type="button" id="cadSubCategoria" name="cadCategoria">Cadastrar</button>
            <button type="button" class="btn btn-danger w-50" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">Fechar</span>
            </button>        
       </div>
    </form>
    
</div>