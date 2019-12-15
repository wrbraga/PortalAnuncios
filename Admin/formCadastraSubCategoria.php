<?php 
namespace Admin;

 include_once dirname(__DIR__,1) . '/Admin/topoAdmin.php';         
 include_once dirname(__DIR__,1) . '/App/ManipularCategorias.php';
       
$categorias = new \App\ManipularCategorias();
$categorias->listarCategorias();

?>    

<div class="container">
    <div class="form-row">
        <div class="col-12">
            <p class="h1 border-bottom">Cadastro de Subcategorias</p>
        </div>            
    </div>
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
       
        <button class="btn btn-primary" type="button" id="cadSubCategoria" name="cadCategoria">Cadastrar</button>
        
    </form>
    
</div>

<?php
    require_once dirname(__DIR__,1) . '/includes/rodape.php';
?>