<?php 
namespace Admin;

include_once dirname(__DIR__,1) . '/Admin/topoAdmin.php';    
include_once dirname(__DIR__,1) . '/App/ManipularCategorias.php';
include_once dirname(__DIR__,1) . '/App/ManipularSubCategorias.php';
       
$subcategorias = new \App\ManipularSubCategorias();

?>
<div class="col-12">
    <button class='btn btn-success' id='btnIncSubCat' data-toggle='modal' data-target='#formModalIncSubCategoria'>Incluir subcategoria</button>    
</div>    

<table class="table" id="tabelaSubCategoria">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
<?php
$max_registros = 10;
$pagina = filter_var((isset($_GET['pagina']) ? $_GET['pagina'] : 1), FILTER_SANITIZE_NUMBER_INT);

$tr = $subcategorias->totalSubCategorias();
$tp = ceil($tr / $max_registros);

if(!$pagina) {
    $pc = "1";
} else {
    $pc = ($pagina > ($tp+1) ? 1 : $pagina);
}

$inicio = $pc - 1;
$inicio *= $max_registros;
$subcategorias->listarSubCategorias("LIMIT $inicio,$max_registros");
$categorias = new \App\ManipularCategorias();
foreach ($subcategorias->subcategorias['dados'] as $indice => $info) {
    
    echo "<tr class='table-data'>\n";
    echo "\t<td>" . $info['id'] . "</td>";
    echo "<td>" . $info['titulo']."</td>";
    $categorias->listarCategoria($info['idCategoria']);
    echo "<td>" . $categorias->getTitulo()."</td>";
    echo "<td>"; 
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $info['imagem'] ).'"/>';
    echo "</td>";
    echo "<td>";
    echo "<button class='btn btn-info' id='btnShowAlterar' type='button' data-toggle='modal' ";
    echo "data-altId='". $info['id'] . "' ";
    echo "data-altIdCat='". $info['idCategoria'] . "' ";
    echo "data-altTitulo='". $info['titulo'] . "' ";
    echo "data-target='#formModalAltSubCategoria' href='?pagina=" . $info['id'] . "'>Alterar</button>";
    echo "<button class='btn btn-danger' id='btnExcluir' type='button' data-toggle='modal' data-target='#modalExcluirSubCategoria'>Excluir</button>";
    echo "</td>";    
    echo "\n</tr>\n";
}
$categorias = null;
?>
    </tbody>
    <tfoot class="table-secondary">
        <tr>
            <td colspan="5">
                <nav class="">
                    <ul class="pagination justify-content-center">
 
                <?php
                $anterior = $pc -1;
                $proximo = $pc +1;
                $disabilitar = "";
                if ($pc<=1) {
                    $disabilitar = "disabled";
                }
                echo "    <li class=\"page-item $disabilitar\"><a class=\"page-link\" href='?pagina=$anterior'>Anterior</a></li>";

                for($pa=1;($pa <= $tp) && ($pa <= 10); $pa++) {
                    $disabilitar = "";
                    if($pc == $pa) {
                        $disabilitar = "disabled";
                    }
                    echo "    <li class=\"page-item $disabilitar\"><a class=\"page-link\" href='?pagina=$pa'>$pa</a></li>";
                }
                
                $disabilitar = "";
                if ($pc>=$tp) {
                    $disabilitar = "disabled";
                }
                echo "    <li class=\"page-item $disabilitar\"><a class=\"page-link\" href='?pagina=$proximo'>Próximo</a></li>";
                ?>
                        </ul>
                   </nav>
            </td>
        </tr>
    </tfoot>
</table>

<div class="modal fade" id="formModalAltSubCategoria" tabindex="-1" role="dialog" aria-labelledby="formModalAltSubCategoria" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alteração da subcategoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='formAltSubCat'>
            <div class="form-group">    
                <label for="nome">Categoria</label>      
                <?php
                    $categorias = new \App\ManipularCategorias();
                    $categorias->listarCategorias();
                ?>
                <select class="form-control" id="idcategoria" name='idCategoria' form="formCadSubCategoria">
                <?php            
                foreach ($categorias->categorias['dados'] as $categoria) {
                    echo "<option value='".$categoria['id']."'>" . $categoria['titulo'] . "</option>";
                }
                ?>
                </select>
            </div>            
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Título:</label>
            <input type="hidden" class="form-control" id="id">
            <input type="text" class="form-control" id="descricao">
          </div>
          <div class="form-group">            
            <label for="endereco">Imagem</label>                  
            <input class="form-control-file" type="file" id="imagem" name="imagem">
            <img id='preview' src="" width="50" height="50" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnConfirAltSubCategoria">Alterar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>        
      </div>
    </div>
  </div>
</div>

<!-- Modal para excluir a conta -->
<div class="modal fade" id="modalExcluirSubCategoria" tabindex="-1" role="dialog" aria-labelledby="modalExcluirCategoria" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exclusão definitiva da categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id='msg'>
        Confirma a Exclusão da categoria?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnExcluirCategoria">Sim Excluir!</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Manter a categoria</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal para INCLUIR a conta -->
<div class="modal fade" id="formModalIncSubCategoria" tabindex="-1" role="dialog" aria-labelledby="modalIncSubCategoria" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inclusão de subcategoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id='msg'>
        <?php
        include_once './formCadastraSubCategoria.php';
        ?>
        
      </div>      
    </div>
  </div>
</div>

<?php
 require_once dirname(__DIR__,1) . '/includes/rodape.php';
?>