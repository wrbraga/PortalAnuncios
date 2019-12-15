<?php 
namespace Admin;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

 include_once dirname(__DIR__,1) . '/Admin/topoAdmin.php';         
 include_once dirname(__DIR__,1) . '/App/ManipularItens.php';
       
//$categorias = new \App\ManipularCategorias();
//$categorias->listarCategorias();

?>    

<div class="container">
    <div class="form-row">
        <div class="col-12">
            <p class="h1 border-bottom">Cadastro de Itens</p>
        </div>            
    </div>
    <form id="formCadSubCategoria" action="" method="post">
        <div class="form-row">
            <div class="col-4">
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
            </div>
            <div class="col-4">
                <div class="form-group">    
                    <label for="nome">Subcategoria</label>                            
                    <select class="form-control" id="idCategoria" name='idCategoria' form="formCadSubCategoria">
                    <?php            
                    foreach ($categorias->categorias['dados'] as $categoria) {
                        echo "<option value='".$categoria['id']."'>" . $categoria['titulo'] . "</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">    
                    <label for="nome">Montadora</label>                            
                    <select class="form-control" id="idCategoria" name='idCategoria' form="formCadSubCategoria">
                    <?php            
                    foreach ($categorias->categorias['dados'] as $categoria) {
                        echo "<option value='".$categoria['id']."'>" . $categoria['titulo'] . "</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">    
            <label for="nome">Ítem</label>                
            <textarea class="form-control" type="text" placeholder="" id="titulo" name="titulo"> </textarea>
        </div>
        
        <div class="form-row">
            <div class="col-2">
                <div class="form-group">                
                    <label for="endereco">Preço</label>                  
                    <input class="form-control-file" type="text" id="preco" name="preco">
                </div>
            </div>                        
            <div class="col-6">
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