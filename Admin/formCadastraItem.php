<?php 
namespace Admin;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

 include_once dirname(__DIR__,1) . '/Admin/topoAdmin.php';         
  include_once dirname(__DIR__,1) . '/App/ManipularCategorias.php';
 include_once dirname(__DIR__,1) . '/App/ManipularSubCategorias.php';
 
$categorias = new \App\ManipularCategorias();
$categorias->listarCategorias();

$subcategorias = new \App\ManipularSubCategorias();
$subcategorias->listarSubCategorias();
?>    

<div class="container">    
    <form id="formCadItens" action="" method="post">
        <div class="form-row">
            <div class="col-4">
                <div class="form-group">    
                    <label for="idCategoria">Categoria</label>                            
                    <select class="form-control" id="idCategoria" name='idCategoria' form="formCadItens">
                        <option value='0' selected disabled>Categoria</option>
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
                    <label for="idSubCategoria">Subcategoria</label>                            
                    <select class="form-control" id="idSubCategoria" name='idSubCategoria' form="formCadItens">
                        <option value='0' selected disabled>Subcategoria</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">    
                    <label for="idMontadora">Montadora</label>                            
                    <select class="form-control" id="idMontadora" name='idMontadora' form="formCadItens">
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
            <label for="titulo">Ítem</label>                
            <textarea class="form-control" placeholder="" id="descricao" name="descricao" form="formCadItens"> </textarea>
        </div>
        
        <div class="form-row">
            <div class="col-4">
                <div class="form-group">                
                    <label for="preco">Preço</label>                  
                    <input class="form-control" type="text" id="preco" name="preco" size="20">
                </div>
            </div>                        
            <div class="col-6">
                <div class="form-group ">                
                    <label class="" for="imagem">Imagem</label>
                    <input class="form-control-file" type="file" id="imagem" name="imagem">                    
                </div>
            </div>                        
            <div class="col-2">
                <div class="form-group ">                                    
                    <img src="" id="preview">
                </div>
            </div>                                    
        </div>
        <div class="form-row">
            <button class="btn btn-primary w-50" type="button" id="cadItens" name="cadItens">Cadastrar</button>
            <button type="button" class="btn btn-danger w-50" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">Fechar</span>
            </button>
        </div>
    </form>
    
</div>