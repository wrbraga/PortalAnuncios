<?php 
namespace Admin;

include_once dirname(__DIR__,1) . '/Admin/topoAdmin.php';    

include_once dirname(__DIR__,1) . '/App/ManipularCategorias.php';
       
$categorias = new \App\ManipularCategorias();


?>
<div class="col-12">
    <p class="h3">Gerenciador de itens</p>
</div>  
<table class="table" id="tabelaCategoria">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
<?php
$max_registros = 10;
$pagina = filter_var((isset($_GET['pagina']) ? $_GET['pagina'] : 1), FILTER_SANITIZE_NUMBER_INT);

$tr = $categorias->totalCategorias();
$tp = ceil($tr / $max_registros);

if(!$pagina) {
    $pc = "1";
} else {
    $pc = ($pagina > ($tp+1) ? 1 : $pagina);
}

$inicio = $pc - 1;
$inicio *= $max_registros;
$categorias->listarCategorias("LIMIT $inicio,$max_registros");

foreach ($categorias->categorias['dados'] as $indice => $categorias) {
    echo "<tr class='table-data'>";
    echo "<td>" . $categorias['id'] . "</td>";
    echo "<td>" . $categorias['titulo']."</td>";
    echo "<td>"; 
    echo '          <img src="data:image/jpeg;base64,'.base64_encode( $categorias['imagem'] ).'"/>';
    echo "</td>";
    echo "<td>";
    echo "<button class='btn btn-success' id='btnAlterar' type='button' data-toggle='modal' ";
    echo "data-linha='". ($indice ) . "' ";
    echo "data-altId='". $categorias['id'] . "' ";
    echo "data-altTitulo='". $categorias['titulo'] . "' ";
    echo " data-target='#formModalAltCategoria' href='?pagina=" . $categorias['id'] . "'>Alterar</button>";
    echo "<button class='btn btn-danger' id='btnExcluir' type='button' data-toggle='modal' data-target='#modalExcluirCategoria'>Excluir</button>";
    echo "</td>";    
    echo "</tr>";
}

?>
    </tbody>
    <tfoot class="table-secondary">
        <tr>
            <td colspan="4">
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

<div class="modal fade" id="formModalAltCategoria" tabindex="-1" role="dialog" aria-labelledby="formModalAltCategoria" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alteração da categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='formAltCat'>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Título:</label>
            <input type="hidden" class="form-control" id="idcategoria">
            <input type="text" class="form-control" id="descricao">
          </div>
          <div class="form-group">            
            <label for="endereco">Imagem</label>                  
            <input class="form-control-file" type="file" id="imagem" name="imagem">
            <img src="" width="50" height="50" style="display:none;" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnConfirAltCategoria">Alterar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>        
      </div>
    </div>
  </div>
</div>

<!-- Modal para excluir a conta -->
<div class="modal fade" id="modalExcluirCategoria" tabindex="-1" role="dialog" aria-labelledby="modalExcluirCategoria" aria-hidden="true">
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

<?php
 require_once dirname(__DIR__,1) . '/includes/rodape.php';
?>